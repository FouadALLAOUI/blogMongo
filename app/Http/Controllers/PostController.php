<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        return Post::all();
    }
    
    public function store(Request $request){
        $data = new Post($request->all()); 
        $data->file = [
            'lab'=>'test label',
            'ext'=>'test ext',
            'fin'=>'test fin'
        ];
        $data->save();    
        return $data;
    }

    public function update(Request $request, Post $post)
    {
        //return Post::update($post);
        $data = new Post($post);
        $data = $request->all();
        $data->save();
    }

    public function destroy(Post $post)
    {
        //return ('destroy');
        $data = Post::destroy($post);
        return $data;
    }

}
