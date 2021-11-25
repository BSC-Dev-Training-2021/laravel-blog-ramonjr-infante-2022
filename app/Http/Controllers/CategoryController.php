<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryType;
use App\Models\BlogPostCategory;
use Illuminate\Database\Eloquent\Model;

class CategoryController extends Controller
{

    public function __construct(){
          
    }

    public function index(){
        $categories = CategoryType::orderBy('id', 'desc')->get();
        for($x = 0;$x < count($categories);$x++){
            $categories[$x]['posts'] = CategoryType::find($categories[$x]->id)->post_in_category;
        }
        return view("categories")->with(["categories"=>$categories]);
    }

    public function create_catagory(Request $request){
        $this->check_cat_name($request);
        $datas = [
            'name'=>$request['category_name']
        ];
        CategoryType::create($datas);
        return redirect("/categories");
    }
    public function update_category(Request $request){
        $datas = [
            'name'=>$request['category_name']
        ];
        CategoryType::where("id","=",$request['category_id'])->update($datas);
        return redirect("/categories");
    }
    public function check_cat_name($request){
        $validated = $request->validate([
            'category_name' => 'required',
        ],
        [   
            'category_name.required' => 'Category name is empty',
        ]);
    }
    public function delete_category(Request $request){
        CategoryType::destroy($request['category_id']);
        return redirect("/categories");
    }
}
