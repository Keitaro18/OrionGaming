<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //Show just 3 Posts
    public function home ()
    {
        $posts = Post::simplePaginate(3);
        return view('accueil', ['posts' => $posts]);
    } 
    //Open 1 page with just 1 Post
    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        return view('post.show', ['post' => $post]);
    }
}

