<?php

namespace KekecMed\Core\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class AbstractCoreResourceController
 * -----------------------------
 *
 * -----------------------------
 * @package KekecMed\Core\Http\Controllers
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
abstract class AbstractCoreResourceController extends AbstractCoreController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    abstract public function index();

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    abstract public function create();

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    abstract public function store(Request $request);

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    abstract public function show($id);

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    abstract public function edit($id);

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    abstract public function update(Request $request, $id);

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    abstract public function destroy($id);

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidationData()
    {
        return [
            'formData.firstname' => 'required|max:255',
            'formData.lastname' => 'required|max:255',
            'formData.gender' => 'required',
            'formData.birthdate' => 'required',
            'formData.insurance_type' => 'required',
            'formData.insurance_id' => 'required',
            'formData.insurance_no' => 'required',
            'formData.phone' => 'required',
            'formData.mobile' => 'required',
            'formData.street' => 'required',
            'formData.no' => 'required',
            'formData.zipcode' => 'required',
            'formData.email' => 'required|email|max:255',

        ];
    }
}