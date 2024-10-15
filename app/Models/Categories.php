<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $with = ['blogs'];
    use HasFactory;
    public function blogs()
    {
        return $this->hasMany(Blogs::class, "category_id");
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
