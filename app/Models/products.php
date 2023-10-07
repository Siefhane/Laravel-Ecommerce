<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price','rating', 'brand','category','image','category_id','creator_id'];


    function Category(){
        return $this->belongsTo(Category::class);
    }
}
