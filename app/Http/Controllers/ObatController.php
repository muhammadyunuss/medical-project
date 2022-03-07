<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreObatRequest;
use App\Http\Requests\UpdateObatRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use DataTables;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "List Obat";
        $action = url("/home");
        return view('obat.index',compact('title','action'));
    }

    public function getObat(Request $request){
        if ($request->ajax()) {
            return DataTables::of(Obat::query())
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreObatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreObatRequest $request, Obat $obat)
    {
        $obat->storeData(array_merge($request->all(), ['created_by' => Auth::user()->name]));
        return response()->json(['success'=>'Data Obat '.$request->nama_obat.' Berhasil di Simpan']);
        // return response()->view('obat.index', compact(['success'=>'Data Obat '.$request->nama_obat.' Berhasil di Simpan']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        $html = '<div class="form-group">
                    <label for="nama_obat">Nama Obat:</label>
                    <input type="text" class="form-control" name="nama_obat" id="editNamaObat" value="'.$obat->nama_obat.'">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea class="form-control" name="keterangan" id="editKeterangan">'.$obat->keterangan.'</textarea>
                </div>';

        return response()->json(['html'=>$html]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateObatRequest  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateObatRequest $request, Obat $obat)
    {
        $obat->updateData($obat->id, array_merge($request->all(), ['updated_by' => Auth::user()->name]));
        return response()->json(['success'=>'Data Obat '.$request->nama_obat.' Berhasil di Update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->deleteData($obat->id);
        return response()->json(['success'=>'Data Obat '.$obat->nama_obat.' Berhasil di Hapus']);
    }
}
