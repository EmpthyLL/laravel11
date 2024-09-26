<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'blog_id', 'body'];

    public function blogs()
    {
        return $this->belongsTo(Blogs::class, 'blog_id', 'blog_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}