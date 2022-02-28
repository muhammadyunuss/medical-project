<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Http\Requests\StorePeriksaRequest;
use App\Http\Requests\UpdatePeriksaRequest;
use Illuminate\Support\Facades\URL;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Form Periksa";
        $action = URL::route('periksa.store');
        return view('periksa.create', compact('title','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriksaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriksaRequest $request)
    {
        $model = new Periksa;
        $model->nama_penyakit = $request->nama_penyakit;
        $model->kelamin  = $request->keterangan;
        $model->created_by = Auth::user()->name;
        $model->updated_by = Auth::user()->name;
        $model->save();

        if(!$model->save()){
            return redirect()->route('periksa.index')->withFail('Error message');
        }

        return redirect()->route('periksa.index')->withSuccess('Success message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function show(Periksa $periksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Periksa $periksa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriksaRequest  $request
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriksaRequest $request, Periksa $periksa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periksa $periksa)
    {
        //
    }
}
