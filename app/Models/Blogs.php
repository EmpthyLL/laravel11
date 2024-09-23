<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = "myblogs";
    protected $primarykey = "blog_id";
    protected $fillable = ['title', 'body','comment_count'];

    public function comments()
    {
        return $this->hasMany(Comments::class, 'blog_id');
    }
}