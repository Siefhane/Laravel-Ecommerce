<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\products;


class Category extends Model
{
    use HasFactory;
    protected $fillable= ['name', 'logo'];
    function products(){
        return $this->hasMany(products::class);

    }
 }
