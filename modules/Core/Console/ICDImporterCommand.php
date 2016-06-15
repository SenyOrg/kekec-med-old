<?php namespace KekecMed\Core\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ICDImporterCommand
 *
 * @author Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Core\Console
 */
class ICDImporterCommand extends Command
{

    /**
     * Structured data
     *
     * @var array
     */
    protected $structure = [];

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
    protected $description = 'This command will import given icd archive into KekecMed. ' .
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

        /*
        $zip = new \ZipArchive();
        $zip->open($this->argument('path-to-icd-archive'));
        $zip->extractTo('storage/app/icd');
        */

        // Check whether ClaML exists
        if (\Storage::disk('local')->exists('icd/Klassifikationsdateien/ClaML.dtd')) {
            $this->info("ZIP is valid");

            // Retrive path to classification file
            $xmlFile = \Storage::disk('local')->files('icd/Klassifikationsdateien/')[1];

            // Load and parse xml
            $this->info('Loading ICD file. This will take a while...');
            $xmlDOM = simplexml_load_string(\Storage::disk('local')->get($xmlFile));
            $this->info('ICD file loaded successfully...');
            $this->info(count($xmlDOM->Class) .' code sections to proceed...');

            // Retrieve base nodes: Chapters
            $chapterNodes = $xmlDOM->xpath('/ClaML/Class[@kind="chapter"]');

            // Create Progressbar
            $this->bar = $this->output->createProgressBar(count($xmlDOM->Class));

            // Proceed chapters recursively
            foreach ($chapterNodes as $node) {
                $this->process($node, $this->structure['children']);
            }

            // Finish :)
            $this->bar->finish();
        } else {
            // That is not a valid  ICD file
            $this->error("ZIP is invalid");
        }
    }

    public function process(\SimpleXMLElement $classNode, &$structure)
    {
        // Update Progressbar
        $this->bar->advance();
        echo "     Processing " . (string)$classNode['code'];

        // Data array
        $data = [
            'code' => (string)$classNode['code'],
            'type' => (string)$classNode['kind'],
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
        foreach ($classNode->Rubric as $rubricNode) {
            $rubricData = [];

            // Check for existing fragment element
            if (!$rubricNode->Label->Fragment) {
                // No fragment present
                $rubricData['label'] = (string)$rubricNode->Label;

                // Check for referenced codes
                if ($rubricNode->Label->Reference) {
                    $rubricData['reference'] = [
                        'class' => (string)$rubricNode->Label->Reference['class'],
                        'code'  => (string)$rubricNode->Label->Reference['code'],
                        'value' => (string)$rubricNode->Label->Reference
                    ];
                }
            } else {
                // Proceed fragments
                foreach ($rubricNode->Label->Fragment as $fragmentNode) {
                    // Retrieve fragment data
                    $rubricData['label'][] = [
                        'type' => (string)$fragmentNode['type'],
                        'label' => (string)$fragmentNode
                    ];
                }
            }

            // Setup collected data
            $data[(string)$rubricNode['kind']][] = $rubricData;
        }

        // Write data into global structure
        $structure = $data;

        // Check for existing subclasses
        if ($classNode->SubClass) {
            foreach ($classNode->SubClass as $subClassDefinitionNode) {
                // Find SubClass <Class></Class>
                $subClassNode = $classNode->xpath('/ClaML/Class[@code="' . (string)$subClassDefinitionNode['code'] . '"]');

                // Check for existing results
                if (count($subClassNode)) {
                    // Process recursively
                    $this->process($subClassNode[0], $structure['children'][]);
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
            ['wasdasd', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }

}
