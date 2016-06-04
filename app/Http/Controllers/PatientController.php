<?php

namespace App\Http\Controllers;

use App\DataTables\PatientTable;
use App\Forms\PatientForm;
use App\Patient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Kris\LaravelFormBuilder\FormBuilderTrait;

/**
 * Class PatientController
 * -----------------------------
 * 
 * -----------------------------
 * @package App\Http\Controllers
 * @author Selcuk Kekec <senycorp@googlemail.com>
 */
class PatientController extends Controller
{

    use FormBuilderTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PatientTable $patientTable)
    {
        return $patientTable->render('patient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('patient.show', ['model' => Patient::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Note the trait used. FormBuilder class can be injected if wanted.
        $patients = $this->form('App\Forms\PatientForm', [
            'method' => 'PUT',
            'url' => route('patient.update', ['id' => $id]),
            'model' => Patient::findOrFail($id)
        ], []);

        return view('patient.edit', compact('patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = $this->form(PatientForm::class);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Patient::findOrFail($id)->update($request->toArray()['patients']);

        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
