<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Populer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function rel_to_popu(){
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
