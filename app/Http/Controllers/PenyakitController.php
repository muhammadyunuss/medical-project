<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use App\Http\Requests\StorePenyakitRequest;
use App\Http\Requests\UpdatePenyakitRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
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
            ->order(function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->addColumn('action', function($row){
                    $actionBtn = '<button type="button" class="btn btn-success btn-sm" id="getEditData" data-id="'.$row->id.'">Edit</button>
                    <button type="button" data-id="'.$row->id.'" data-toggle="modal" data-target="#DeleteModal" class="btn btn-danger btn-sm" id="getDeleteId">Hapus</button>';
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
    public function store(StorePenyakitRequest $request, Penyakit $penyakit)
    {
        $penyakit->storeData(array_merge($request->all(), ['created_by' => Auth::user()->name]));
        return response()->json(['success'=>'Data Penyakit '.$request->nama_penyakit.' Berhasil di Simpan']);
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
        $html = '<div class="form-group">
                    <label for="penyakit">Nama Penyakit:</label>
                    <input type="text" class="form-control" name="nama_penyakit" id="editNamaPenyakit" value="'.$penyakit->nama_penyakit.'">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea class="form-control" name="keterangan" id="editKeterangan">'.$penyakit->keterangan.'</textarea>
                </div>';

        return response()->json(['html'=>$html]);
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
        $penyakit->updateData($penyakit->id, array_merge($request->all(), ['updated_by' => Auth::user()->name]));
        return response()->json(['success'=>'Data Penyakit '.$request->nama_penyakit.' Berhasil di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyakit $penyakit)
    {
        $penyakit->deleteData($penyakit->id);
        return response()->json(['success'=>'Data Penyakit '.$penyakit->nama_penyakit.' Berhasil di Hapus']);
    }
}
