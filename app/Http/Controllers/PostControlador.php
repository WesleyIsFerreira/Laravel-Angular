<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostControlador extends Controller
{

    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $path = $request->file('arquivo')->store('imagens', 'public');

        $post = new Post();
        $post->nome = $request->nome;
        $post->email = $request->email;
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->mensagem = $request->mensagem;
        $post->arquivo = $path;
        $post->likes = 0;
        $post->save();

        return response($post, 200);

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if(isset($post)){
            Storage::disk('public')->delete($post->arquivo);
            $post->delete();
            return 204;
        }
        return response('Post não encontrado', 404);
    }

    public function like($id)
    {
        $post = Post::find($id);
        if(isset($post)){
            $post->likes++;
            $post->save();
            return $post;
        }
        return response('Post não encontrado', 404);
    }
}
