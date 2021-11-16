<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;

class ArticleController extends Controller
{
    public function __construct(){
          
    }

    public function index($blog_id){

        $data = BlogPost::select("users.name","blog_posts.id","blog_posts.content","blog_posts.title","blog_posts.description",
        "blog_posts.img_link","blog_posts.created_by","blog_posts.created_at","blog_posts.updated_at")
                ->join('users', 'users.id', '=', 'blog_posts.created_by')
                ->where("blog_posts.id","=",$blog_id)
                ->get();
        $categories = $this->blog_categories($data[0]->id);
        $data[0]->categories = $categories;
        // return $data;
        return view('article')->with(["blog"=>$data]);
    }

    public function blog_categories($blog_id){
        $categories = BlogPostCategory::where("blog_post_id","=",$blog_id)
                    ->join("category_types","blog_post_categories.category_id","=","category_types.id")
                    ->get();
        return $categories;
    }
}
