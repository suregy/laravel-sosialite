<?php

namespace App\Http\Controllers;

use App\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $arrayRespond = $request->all();
        if(empty(sizeof($arrayRespond)))
        {
            $datas = Destinasi::orderBy('id', 'asc')->paginate(5);
        }else{
            $datas = Destinasi::cariDestinasi($request->all());
        }

        if($request->ajax())
        {
            return view('admin.destinasi.table',compact(['datas']));
        }else{
            return view('admin.destinasi.index',compact(['datas']));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.destinasi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $status = '';
        $err = '';
        $validator = Validator::make(request()->all(), [
            'namapendek'  => 'required',
            'namapanjang'  => 'required',
            'koordinatlokasi'  => 'required'
          ]);
        
          if ($validator->fails()) {
            $err = 'Data tidak lengkap';
            return response()->json([
              'err' => $err,
            ]);
        }else{
            $datas = new Destinasi();
            $datas->nama_pendek = $request->namapendek;
            $datas->nama_panjang = $request->namapanjang;
            $datas->kooridat_lokasi = $request->koordinatlokasi;
            $datas->save();

            $status = 'Data berhasil disimpan';
            $url = url('/destinasi');
            return response()->json([
                'status' => $status,
                'err' => $err,
                'url' => $url
              ]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function show(Destinasi $destinasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Destinasi::find($id);
        return view('admin.destinasi.formedit', compact(['datas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $status = '';
        $err = '';
        $validator = Validator::make(request()->all(), [
            'namapendek'  => 'required',
            'namapanjang'  => 'required',
            'koordinatlokasi'  => 'required'
          ]);
        
          if ($validator->fails()) {
            $err = 'Data tidak lengkap';
            return response()->json([
              'err' => $err,
            ]);
        }else{
            $datas = Destinasi::find($id);
            $datas->nama_pendek = $request->namapendek;
            $datas->nama_panjang = $request->namapanjang;
            $datas->kooridat_lokasi = $request->koordinatlokasi;
            $datas->save();

            $status = 'Data berhasil disimpan';
            $url = url('/destinasi');
            return response()->json([
                'status' => $status,
                'err' => $err,
                'url' => $url
              ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $err = '';
        $url = 'destinasi';
        $typ = 'POST';
        $status = 'data berhasil dihapus';

        $explode    = explode(",", $id);

        for ($c = 0; $c < sizeof($explode); $c++) {
          $data = Destinasi::find($explode[$c])->delete();
        }

        return response()->json([
            'err' => $err,
            'status' => $status,
            'url' => $url,
            'type' => $typ

          ]);
    }
}
