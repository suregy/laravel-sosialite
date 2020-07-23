<?php

namespace App\Http\Controllers;

use App\Pagintaion;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PaginationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        $arrayRespond = $request->all();
        if(empty(sizeof($arrayRespond)))
        {
            $datas = Pagintaion::orderBy('id', 'asc')->paginate(5);
        }else{
            $datas = Pagintaion::cariprouduct($request->all());
        }
        $category = Post::all();

        if($request->ajax())
        {
            return view('pagination.table',compact(['datas','category']));
        }else{
            return view('pagination.index',compact(['datas','category']));
        }
        
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $status = 'success';
        // return response()->json([
        //     'status' => $status
        //   ]);
        $category = Post::all();
        return View('pagination.form', compact(['category']));
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
            'name'  => 'required'
          ]);
        if ($validator->fails()) {
            $err = 'Incomplete data';
            return response()->json([
              'err' => $err,
            ]);
        }else{
            $datas = new Pagintaion();
            $datas->category = $request->category;
            $datas->name = $request->name;
            $datas->price = $request->price;
            $datas->save();

            $status = 'Data berhasil disimpan';
            $url = url('/pagination');
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
     * @param  \App\Pagintaion  $pagintaion
     * @return \Illuminate\Http\Response
     */
    public function show(Pagintaion $pagintaion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagintaion  $pagintaion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Post::all();
        $datas = Pagintaion::find($id);
        //dd($datas);
        return View('pagination.formedit', compact(['datas','category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagintaion  $pagintaion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = '';
        $err = '';

        $validator = Validator::make(request()->all(), [
            'name'  => 'required'
          ]);
        if ($validator->fails()) {
            $err = 'Incomplete data';
            return response()->json([
              'err' => $err,
            ]);
        }else{
            $datas = Pagintaion::find($id);
            $datas->category = $request->category;
            $datas->name = $request->name;
            $datas->price = $request->price;
            $datas->save();

            $status = 'Data berhasil disimpan';
            $url = url('/pagination');
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
     * @param  \App\Pagintaion  $pagintaion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $err = '';
        $url = 'pagination';
        $typ = 'POST';
        $status = 'data berhasil dihapus';

        $explode    = explode(",", $id);

        for ($c = 0; $c < sizeof($explode); $c++) {
          $data = Pagintaion::find($explode[$c])->delete();
        }

        return response()->json([
            'err' => $err,
            'status' => $status,
            'url' => $url,
            'type' => $typ

          ]);
        
    }

    public function main()
    {
      $datas  = Pagintaion::all();
      return view('pagination.main', compact(['datas']));
    }
}
