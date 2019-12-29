<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:editor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('published_at')->where('user_id',auth()->user()->id)->get();

        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->body = $request->input('body');
        if ($request->hasFile('img')) {
          if(substr($request->file('img')->getMimeType(), 0, 5) == 'image') {
            if ($request->file('img')->isValid()){
              $img = $request->file('img')->getClientOriginalName();
              $request->file('img')->move('img/',$img);
              $post->image = $img;
            }
          }
        }
        $post->category_id = $request->input('category');
        $post->user_id = auth()->user()->id;

        $post->save();

        $posts = Post::latest('published_at')->get();

        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $post = Post::find($id);

      return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();

        return view('posts.edit',['post' => Post::find($id),'categories' => $categories]);
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
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->body = $request->input('body');
        if ($request->hasFile('img')) {
          if(substr($request->file('img')->getMimeType(), 0, 5) == 'image') {
            if ($request->file('img')->isValid()){
              $img = $request->file('img')->getClientOriginalName();
              $request->file('img')->move('img/',$img);
              if (!is_null($post->image)){
                unlink("/home/ubuntu/ProyectosLaravel/ud6_laravel_roles_blog_base/public/img/" . $post->image);
              }
              $post->image = $img;
            }
          }
        }
        $post->category_id = $request->input('category');

        $post->save();

        $posts = Post::latest('published_at')->get();

        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      Post::find($id)->delete();

      $posts = Post::all();

      return view('posts.index',['posts'=>$posts]);
    }
}
