<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('titulo')
            ->paginate(5);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('inicio')->with('mensaje', 'Aquí va un formulario');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->route('inicio')->with('mensaje', 'Aquí va un formulario');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        $posts = Post::orderBy('titulo')
        ->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Simulación del método de inserción
     *
     *
     */
    public function nuevoPrueba()
    {
        $post = new Post();
        $randomNumber = mt_rand(1, 100);
        $post->titulo = "Título $randomNumber";
        $post->contenido = "Contenido $randomNumber";
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Simulación del método de editar
     *
     *
     */
    public function editarPrueba($id)
    {
        $post = Post::findOrFail($id);

        $post->titulo = "Título modificado";

        $post->save();

        return redirect()->route('posts.index');
    }
}
