<?php namespace KekecMed\Patient\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use KekecMed\Patient\DataTables\PatientTable;
use KekecMed\Insurance\Entities\Insurance;
use KekecMed\Patient\Entities\Patient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class PatientController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(PatientTable $patientTable)
	{
		return $patientTable->render('patient::index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$model = new Patient();
		$model->insurance = new Insurance();
		return view('patient::edit', ['create' => true, 'model' => $model]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, $this->getValidationData());
		$data = $request->toArray()['formData'];
		if (Input::file('formData.image')) {
			/* Get image and resize it */
			$image = Input::file('formData.image');
			\Image::make($image->getRealPath())
				->resize(160, 160)
				->save($image->getRealPath());

			\Storage::put(
				'public/' . $image->hashName(),
				file_get_contents($image->getRealPath())
			);

			$data['image'] = $image->hashName();
		}else {
			unset($data['image']);
		}
		$model = Patient::create($data);

		return redirect()->route('patient.show', $model->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		return view('patient::show', ['model' => Patient::findOrFail($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$model = Patient::findOrFail($id);

		return view('patient::edit', ['model' => $model]);
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
		$this->validate($request, $this->getValidationData());
		$data = $request->toArray()['formData'];

		if (Input::file('formData.image')) {
			/* Get image and resize it */
			$image = Input::file('formData.image');
			\Image::make($image->getRealPath())
				->resize(160, 160)
				->save($image->getRealPath());

			\Storage::put(
				'public/' . $image->hashName(),
				file_get_contents($image->getRealPath())
			);

			$data['image'] = $image->hashName();
		} else {
			unset($data['image']);
		}
		Patient::findOrFail($id)->update($data);

		return redirect()->route('patient.show', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Patient::destroy($id);
		return redirect()->route('patient.index');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
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