<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function form(){
        return view('post.forminput');
    }

    public function input(Request $request){

        $request->validate([
            'judul' => ['required'],
        ]);
        
        $imagePath = $this->storeImage($request->file('gambar'));

        Post::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'gambar' => $imagePath,
        ]);
        return redirect()->route('home');
    }
    
    private function storeImage ($file): string {
        $fileName = rand() . $file->getClientOriginalName();
        $file->move('uploads', $fileName);
        return "/uploads/" . $fileName;
    }

    public function lihat(){
        $user = User::find(Auth::id());

        return view('post.lihatpostingan',[
            "user" => $user,
            "posts" => $user->Posts()->get()
        ]);
    }

    public function tampilinput($id){
        $post = Post::find($id);
        return view('post.update',['post' => $post]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'judul' => ['required'],
        ]);
        $post = post::find($id);
        $post->judul = $request->judul;
        $post->gambar = $request->file('gambar') ? $this->storeimage($request->file('gambar')) : $post->gambar;
        $post->save();
        return view ('home');
    }
    public function delete($id){
        post::find($id)->delete();
        return redirect()->route('lihat');
    }

}
