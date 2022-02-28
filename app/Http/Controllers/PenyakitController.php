<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Http\Requests\StorePenyakitRequest;
use App\Http\Requests\UpdatePenyakitRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use DataTables;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Penyakit";
        $action = url("/home");
        return view('penyakit.index',compact('title','action'));
    }

    public function getPenyakit(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Penyakit::query())
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
        $title = "Form Penyakit";
        $action = URL::route('penyakit.store');
        return view('penyakit.create', compact('title','action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenyakitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenyakitRequest $request)
    {
        $model = new Penyakit;
        $model->nama_penyakit = $request->nama_penyakit;
        $model->keterangan  = $request->keterangan;
        $model->created_by = Auth::user()->name;
        $model->updated_by = Auth::user()->name;
        $model->save();

        if(!$model->save()){
            return redirect()->route('penyakit.index')->withFail('Error message');
        }

        return redirect()->route('penyakit.index')->withSuccess('Data Penyakit '.$request->nama_penyakit.' Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyakit $penyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenyakitRequest  $request
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenyakitRequest $request, Penyakit $penyakit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyakit $penyakit)
    {
        //
    }
}
