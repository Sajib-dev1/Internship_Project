<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    function rel_to_user(){
        return $this->belongsTo(User::class,'bloger_id');
    }

    function rel_to_cat(){
        return $this->belongsTo(Category::class,'category');
    }
}
