<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    //
    protected $fillable = ['title', 'author', 'body', 'published'];

    protected $guarded = ['id'];
}
