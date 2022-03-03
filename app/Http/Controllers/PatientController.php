<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use DataTables;
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Patient List";
        $action = url("/home");
        return view('patient.index',compact('title','action'));
    }

    public function getPatient(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Patient::query())
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Patient Form";
        $action = URL::route('patient.store');
        return view('patient.create', compact('title','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        $model = new Patient;
        $model->nama = $request->nama;
        $model->alamat  = $request->alamat;
        $model->alamat  = $request->alamat;
        $model->pekerjaan  = $request->pekerjaan;
        $model->agama  = $request->agama;
        $model->umur  = $request->umur;
        $model->hp  = $request->hp;
        $model->kelamin  = $request->kelamin;
        $model->status_menikah  = $request->status_menikah;
        $model->created_by = Auth::user()->name;
        $model->updated_by = Auth::user()->name;
        $model->save();

        if(!$model->save()){
            return redirect()->route('patient.index')->withFail('Error message');
        }

        return redirect()->route('patient.index')->withSuccess('Success message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $article = new Patient;
        $model = $article->findData($patient);

        $html = '<div class="form-group">
                    <label for="Title">Title:</label>
                    <input type="text" class="form-control" name="title" id="editTitle" value="'.$model->title.'">
                </div>
                <div class="form-group">
                    <label for="Name">Description:</label>
                    <textarea class="form-control" name="description" id="editDescription">'.$model->description.'
                    </textarea>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
