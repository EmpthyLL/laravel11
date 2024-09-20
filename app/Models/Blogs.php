<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = "myblogs";
    protected $primarykey = "blog_id";
    protected $fillable = ["title", "body"];
    use HasFactory;
}
