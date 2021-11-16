<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;

class HomeController extends Controller
{
    public function __construct(){
          
    }

    public function index(){
        $data = BlogPost::select("users.name","blog_posts.id","blog_posts.content","blog_posts.title","blog_posts.description",
        "blog_posts.img_link","blog_posts.created_by","blog_posts.created_at","blog_posts.updated_at")
                ->join('users', 'users.id', '=', 'blog_posts.created_by')
                ->get();

        return view('index')->with(["blogs"=>$data]);
    }

}
