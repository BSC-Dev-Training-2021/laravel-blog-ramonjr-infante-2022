<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\BlogPostComment;

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
        $comments = $this->get_blog_comments($data[0]->id);
        $data[0]->categories = $categories;
        $data[0]->comments = $comments;
        return view('article')->with(["blog"=>$data]);
    }

    public function blog_categories($blog_id){
        $categories = BlogPostCategory::where("blog_post_id","=",$blog_id)
                    ->join("category_types","blog_post_categories.category_id","=","category_types.id")
                    ->get();
        return $categories;
    }
    public function insert_comment($blog_id,Request $request){
        $validated = $request->validate([
            'blog_comment_txt' => 'required',
        ],['blog_comment_txt.required' => 'Comment section is empty', ]);
        
        $insert_comment = [
            "comment"=>$request['blog_comment_txt'],
            "user_id"=>1,
            "blog_post_id"=>$blog_id,
        ];
        BlogPostComment::create($insert_comment);
        return back();
    }
    public function get_blog_comments($blog_id){
        $comments = BlogPostComment::select("blog_post_comments.id","blog_post_comments.comment",
        "blog_post_comments.user_id","blog_post_comments.blog_post_id","blog_post_comments.created_at"
        ,"blog_post_comments.updated_at","users.name")
                    ->join("users","users.id","=","blog_post_comments.user_id")
                    ->where("blog_post_id","=",$blog_id)->orderBy('id', 'DESC')->get();
        return $comments;
    }
}
