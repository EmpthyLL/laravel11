<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    protected $fillable = ['category_id', 'title', 'body', 'thumbnail'];
    use HasFactory;
}