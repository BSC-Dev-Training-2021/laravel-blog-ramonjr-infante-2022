<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogPostCategory;

class CategoryType extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'name',
    ];

    public function post_in_category(){
        return $this->hasMany(BlogPostCategory::class, 'category_id','id');
    }
}
