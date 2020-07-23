<?php

namespace App\Http\Controllers;

use App\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arrayRespond = $request->all();
        if(empty(sizeof($arrayRespond)))
        {
            $datas = Bus::orderBy('id', 'asc')->paginate(5);
        }else{
            $datas = Bus::cariBus($request->all());
        }

        if($request->ajax())
        {
            return view('admin.bus.table',compact(['datas']));
        }else{
            return view('admin.bus.index',compact(['datas']));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bus.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->nopolisi);
        $status = '';
        $err = '';
        $validator = Validator::make(request()->all(), [
            'nopolisi'  => 'required',
            'jmlkursi'  => 'required',
            'gambar'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          ]);
          if ($validator->fails()) {
            $err = 'Data tidak lengkap';
            return response()->json([
              'err' => $err,
            ]);
        }else{
            $datas = new Bus();
            $datas->nopolisi = $request->nopolisi;
            $datas->jmlkursi = $request->jmlkursi;

            if($request->hasFile('gambar'))
            {
                $file = $request->file('gambar');
                $ext = $file->getClientOriginalExtension();
                $fileName = time().".".$ext;
                $folder = public_path('image/bus');
                $file->move($folder, $fileName);
                $datas->gambar = $fileName;
            }

            $datas->save();

            $status = 'Data berhasil disimpan';
            $url = url('/bus');
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
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Bus::find($id);
        return view('admin.bus.formedit', compact(['datas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = '';
        $err = '';
        $validator = Validator::make(request()->all(), [
            'nopolisi'  => 'required',
            'jmlkursi'  => 'required'
          ]);
        
          if ($validator->fails()) {
            $err = 'Data tidak lengkap';
            return response()->json([
              'err' => $err,
            ]);
         }else{
            $datas = Bus::find($id);
            $datas->nopolisi = $request->nopolisi;
            $datas->jmlkursi = $request->jmlkursi;

            if($request->hasFile('gambar'))
            {
                $folder = public_path('image/bus');
                $gambar = $datas->gambar;
                if(file_exists(public_path('image/bus/'.$gambar))){
                    unlink(public_path('image/bus/'.$gambar));
                }
               
                $file = $request->file('gambar');
                $ext = $file->getClientOriginalExtension();
                $fileName = time().".".$ext;
                $file->move($folder, $fileName);
                $datas->gambar = $fileName;
            }else{
                $datas->gambar = $datas->gambar;
            }

            $datas->save();

            $status = 'Data berhasil disimpan';
            $url = url('/bus');
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
     * @param  \App\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $err = '';
        $url = 'bus';
        $status = 'Data berhasil dihapus';

        $explode = explode(",",$id);

        for($i = 0; $i < sizeof($explode); $i++){

            //untuk hapus gambar
            $gambar = Bus::where('id',$explode[$i])->first();
            if(file_exists(public_path('image/bus/'.$gambar->gambar))){
                unlink(public_path('image/bus/'.$gambar->gambar));
            }

            //untuk hapus data
            $data = Bus::find($explode[$i])->delete();
        }

        return response()->json([
            'err' => $err,
            'status' => $status,
            'url' => $url
        ]);

    }
}
