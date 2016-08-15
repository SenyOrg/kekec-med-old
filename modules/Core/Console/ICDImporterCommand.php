<?php namespace KekecMed\Core\Console;

use Illuminate\Console\Command;
use KekecMed\Core\Entities\ICD;
use KekecMed\Core\Entities\ICDMeta;
use KekecMed\Core\Entities\ICDRubric;
use KekecMed\Core\Entities\ICDRubricType;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class ICDImporterCommand
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Console
 */
class ICDImporterCommand extends Command
{
    /**
     * Progressbar
     *
     * @var null
     */
    protected $bar = null;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'import:icd';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:icd {path-to-icd-archive}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will import an icd archive into KekecMed. ' .
    'Please provide a valid icd archive file from https://www.dimdi.de/dynamic/de/klassi/downloadcenter/ from \'systematic\' section in ClaML/XML format.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        // Increase memory limit
        ini_set('memory_limit', '1G');
        $this->info("Welcome to ICDImport for KekecMed");
        $this->info("Extracting icd archive...");

        // Unzip archive
        $zip = new \ZipArchive();
        $zip->open($this->argument('path-to-icd-archive'));
        $zip->extractTo('storage/app/icd');

        // Check whether ClaML exists
        if (\Storage::disk('local')->exists('icd/Klassifikationsdateien/ClaML.dtd')) {
            $this->info("ZIP is valid");

            // Retrive path to classification file
            $xmlFile = \Storage::disk('local')->files('icd/Klassifikationsdateien/')[1];

            // Load and parse xml
            $this->comment('Loading ICD file. This will take a while...');
            $xmlDOM = simplexml_load_string(\Storage::disk('local')->get($xmlFile));
            $this->info('ICD file loaded successfully...');
            $this->comment(count($xmlDOM->Class) . ' code sections to proceed...');

            // Retrieve base nodes: Chapters
            $chapterNodes = $xmlDOM->xpath('/ClaML/Class[@kind="chapter"]');

            // Create Progressbar
            $this->bar = $this->output->createProgressBar(count($xmlDOM->Class));

            // Proceed chapters recursively
            foreach ($chapterNodes as $node) {
                $this->process($node);
            }

            // Finish :)
            $this->bar->finish();
        } else {
            // That is not a valid  ICD file
            $this->error("ZIP is invalid");
        }
    }

    public function process(\SimpleXMLElement $classNode, $parent = [])
    {
        // Update Progressbar
        $this->bar->advance();
        echo "   " . (time()-($this->bar->getStartTime())) . ' Second(s)    Processing:  ' . (string)$classNode['code'];

        // Handle Parent Data
        if (count($parent) == 0) {
            $path = [];
            $chapter_id = $block_id = $firstlevel_id = $secondlevel_id = null;
        } else {
            $path = array_get($parent, 'path', []);
            $chapter_id = array_get($parent, 'chapter_id', null);
            $block_id = array_get($parent, 'block_id', null);
            $firstlevel_id = array_get($parent, 'firstlevel_id', null);
            $secondlevel_id = array_get($parent, 'secondlevel_id', null);
        }

        // Prepare Model Data
        $modelData = [
            'path'           => implode(' > ', $path),
            'type'           => $classNode['kind']->__toString(),
            'code'           => $classNode['code']->__toString(),
            'chapter_id'     => $chapter_id,
            'block_id'       => $block_id,
            'firstlevel_id'  => $firstlevel_id,
            'secondlevel_id' => $secondlevel_id
        ];

        /**
         * Proceed rubric data
         * [
         *      code-hint, definition,
         *      exclusion, inclusion,
         *      introduction, modifierLink,
         *      note, preferred,
         *      preferredLong, text
         * ]
         */
        $rubricCollection = [];
        if ($classNode->Rubric) {
            foreach ($classNode->Rubric as $rubricNode) {
                $rubricData = [
                    'content'   => '',
                    'reference' => ''
                ];

                // Set Rubric Type
                $rubricData['type_id'] = ICDRubricType::firstOrCreate([
                    'title' => $rubricNode['kind']->__toString()
                ])->id;

                // Check for existing fragment element
                if (!count($rubricNode->Label->children()) || $rubricNode->Label->Reference) {
                    // No fragment present
                    $rubricData['content'] = $rubricNode->Label->__toString();

                    // Set up title of icd as preferred label
                    if ($rubricNode['kind']->__toString() == 'preferred') {
                        $modelData['title'] = $rubricNode->Label->__toString();
                    }

                    // Check for referenced codes
                    if ($rubricNode->Label->Reference) {
                        foreach ($rubricNode->Label->Reference as $referenceNode) {
                            $rubricData['reference'] = trim($referenceNode->__toString()) . ', ';
                        }
                    }
                } else {
                    // Proceed fragments
                    foreach ($rubricNode->Label->children() as $labelChildNode) {
                        // Retrieve fragment data
                        $rubricData['content'] .= $labelChildNode->__toString() . '\n';

                        // Check for referenced codes
                        if ($labelChildNode->Reference) {
                            foreach ($labelChildNode->Reference as $referenceNode) {
                                $rubricData['reference'] .= trim($referenceNode->__toString()) . ', ';
                            }
                        }
                    }

                    // Clean up content: Cut last 2 digits => '\n'
                    if (strlen($rubricData['content']))
                        $rubricData['content'] = substr($rubricData['content'], 0, -2);
                }

                // Clean up reference: Cut last 2 digits => ', '
                if (strlen($rubricData['reference']))
                    $rubricData['reference'] = substr($rubricData['reference'], 0, -2);

                // Include Rubric into Collection
                $rubricCollection[] = new ICDRubric($rubricData);
            }
        }

        $metaCollection = [];
        if ($classNode->Meta) {
            foreach ($classNode->Meta as $metaNode) {
                $metaCollection[] = new ICDMeta([
                    'meta'  => $metaNode['name']->__toString(),
                    'value' => $metaNode['value']->__toString()
                ]);
            }
        }

        // Create ICD Model
        $model = ICD::create($modelData);

        // Insert Rubrics
        if (count($rubricCollection)) {
            $model->rubrics()->saveMany($rubricCollection);
        }

        // Insert Metas
        if (count($metaCollection)) {
            $model->metas()->saveMany($metaCollection);
        }

        // Check for existing subclasses
        if ($classNode->SubClass) {
            switch ($modelData['type']) {
                case 'chapter':
                    $chapter_id = $model->id;
                    break;
                case 'block':
                    $block_id = $model->id;
                    break;
                case 'category':
                    if ($firstlevel_id === null) {
                        $firstlevel_id = $model->id;
                    } else {
                        $secondlevel_id = $model->id;
                    }
            }

            $path[] = $modelData['code'];
            $parent = [
                'path'           => $path,
                'chapter_id'     => $chapter_id,
                'block_id'       => $block_id,
                'firstlevel_id'  => $firstlevel_id,
                'secondlevel_id' => $secondlevel_id
            ];

            foreach ($classNode->SubClass as $subClassDefinitionNode) {
                // Find SubClass <Class></Class>
                $subClassNode = $classNode->xpath('/ClaML/Class[@code="' . $subClassDefinitionNode['code']->__toString() . '"]');

                // Check for existing results
                if (count($subClassNode)) {
                    // Process recursively
                    $this->process($subClassNode[0], $parent);
                }
            }
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['path-to-icd-archive', InputArgument::REQUIRED, 'Path to icd-archive-file.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            // ['example-option', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

}
