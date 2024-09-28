<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $table = "myblogs";
    protected $primarykey = "blog_id";
    protected $fillable = ['category_id', 'title', 'body'];

    public function comments()
    {
        return $this->hasMany(Comments::class, 'blog_id', 'blog_id');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
