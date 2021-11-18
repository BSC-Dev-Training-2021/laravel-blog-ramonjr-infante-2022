<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'user_id',
        'blog_post_id',
    ];
    


}
