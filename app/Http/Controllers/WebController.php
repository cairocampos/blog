<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{   
    public function __construct()
    {
        $this->middleware("auth:web");
    }

    public function index()
    {
        return view("home");
    }

    public function posts()
    {
        return view("posts");
    }

    public function projects()
    {
        return view("projects");
    }
}
