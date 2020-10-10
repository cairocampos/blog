<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use App\Models\Post;

class PostController extends Controller
{   
    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = Post::all();

        return view("posts", [
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $data = $request->only(["title", "subtitle", "content","cover", "tags"]);

        $data["slug"] = Str::slug($data["title"], '-');
        $data["user_id"] = Auth::id();

        $validator = Validator::make($data, [
            "title" => ["bail","required", "string", "unique:posts", "max:100"],
            "subtitle" => ["required", "string", "max:100"],
            "content" => ["required"],
            "slug" => ["required", "string", "unique:posts"]
        ]);

        if($validator->fails()) {
            return redirect()->route("posts.create")
                ->withErrors($validator)
                ->withInput();
        }


        if(!empty($data["cover"])) {
            $filename = md5(time().rand(0,999).time()).".".$request->file("cover")->extension();
            $request->file("cover")->move(public_path("media/images/covers"), $filename);
            $data["cover"] = $filename;           
        }

        $post = Post::create($data);
            
        return redirect()->route("posts");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $post = Post::find($id);

        return view("post.edit", [
            "post" => $post
        ]);
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
        //
    }
}
