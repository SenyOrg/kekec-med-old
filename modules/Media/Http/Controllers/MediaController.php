<?php namespace KekecMed\Media\Http\Controllers;

use Illuminate\Http\Request;
use KekecMed\Core\Abstracts\Controllers\View\AbstractViewController;
use KekecMed\Media\Entities\Media;

/**
 * Class MediaController
 *
 * @author  Selcuk Kekec <senycorp@googlemail.com>
 * @package KekecMed\Media\Http\Controllers
 */
class MediaController extends AbstractViewController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->methodNotProvided(__METHOD__);
    }

    /**
     * Not provided action
     *
     * @param $method
     *
     * @throws \Exception
     */
    private function methodNotProvided($method)
    {
        throw new \Exception('MediaController does not provide an ' . $method . '-Method');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->methodNotProvided(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->methodNotProvided(__METHOD__);
    }

    /**
     * Download a given Media Object
     *
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($id)
    {
        $model = Media::findOrFail($id);

        return \Response::download(storage_path('app/public/' . $model->path), $model->filename, [
            'Content-Type'   => $model->filetype,
            'Content-length' => $model->filesize
        ]);
    }

    /**
     * Delete a given Media Object
     *
     * @param $id
     */
    public function delete($id)
    {
        $model = Media::findOrFail($id);

        $model->delete();

        return redirect()->back();
    }

    /**
     * Get model class
     *
     * @return \Eloquent
     */
    protected function getModelClass()
    {
        return Media::class;
    }

    /**
     * Get Module identifier
     *
     * @return string
     */
    protected function getIdentifier()
    {
        return 'media';
    }
}