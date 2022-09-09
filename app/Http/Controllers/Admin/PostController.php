<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PostFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(){
        $category = Category::where('status', '0')->get();
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        // $request = $request -> validated();

        $post = new Post;
        $post->category_id = $request['category_id'];
        $post->name = $request['name'];
        $post->description = $request['description'];
        $post->yt_iframe = $request['yt_iframe'];
        $post->meta_title = $request['meta_title'];
        $post->meta_description = $request['meta_description'];
        $post->meta_keyword = $request['meta_keyword'];
        $post->status = $request->status == true ? '1':'0';
        $post->created_by = Auth::user()->id;
        $post->save();

        return redirect('admin/posts')->with('message', 'Post Added Successfully!');
    }

    public function edit($post_id){
        $category = Category::find($post_id);
        return view('admin.post.edit', compact('category'));
    }
}