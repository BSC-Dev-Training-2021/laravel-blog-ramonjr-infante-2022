<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;

class PostController extends Controller
{
    public function __construct(){
          
    }

    public function post(){
        return view('post')->with("categories",CategoryType::all());  
    }

    public function create_post(Request $request){
        $this->validate_blog_form($request);
        $data = [
            'content'=>$request['blog_content_txt'],
            'title'=>$request['blog_title_txt'],
            'description'=>$request['blog_description_txt'],
            'created_by'=>1,//user ng nakalogin
        ];
        $new_post = BlogPost::create($data);
        $this->connect_blog_to_category($new_post->id,$request['blog_category_txt']);
        return back()->with(["categories"=>CategoryType::all(),"success_message"=>"Blog posted"]);
    }

    public function validate_blog_form($request){
        $validated = $request->validate([
            'blog_title_txt' => 'required',
            'blog_description_txt' => 'required',
            'blog_content_txt' => 'required',
            'blog_category_txt' => 'required',
        ],
        [   
            'blog_title_txt.required' => 'Title is empty',
            'blog_description_txt.required'=> 'Description is empty',
            'blog_content_txt.required' => 'Content is empty',
            'blog_category_txt.required' => 'You need to choose atleast one category',
        ]);

    }

    public function connect_blog_to_category($new_blog_id,$categories){
        $data = [];
        if(count($categories) != 0){
            for($x = 0;$x < count($categories);$x++){
                $data[] = [
                    "blog_post_id"=>$new_blog_id,
                    "category_id"=>$categories[$x],
                ];
            }
        }
        if(count($data) != 0){
            BlogPostCategory::insert($data);
        }
    }
}
