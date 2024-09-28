<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name'];
    use HasFactory;
    public function blogs()
    {
        return $this->hasMany(Blogs::class);
    }
}
