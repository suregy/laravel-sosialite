<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('search', $request
              ->has('search') ? $request->get('search') : ($request->session()
              ->has('search') ? $request->session()->get('search') : ''));
              
              $request->session()->put('field', $request
              ->has('field') ? $request->get('field') : ($request->session()
              ->has('field') ? $request->session()->get('field') : 'title'));

              $request->session()->put('sort', $request
                      ->has('sort') ? $request->get('sort') : ($request->session()
                      ->has('sort') ? $request->session()->get('sort') : 'asc'));

        $posts = new Post();
                      $posts = $posts->where('title', 'like', '%' . $request->session()->get('search') . '%')
                          ->orderBy($request->session()->get('field'), $request->session()->get('sort'))
                          ->paginate(5);
                          
                      if ($request->ajax()) {
                        return view('posts.index', compact('posts'));
                      } else {
                        return view('posts.ajax', compact('posts'));
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
