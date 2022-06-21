<?php

namespace App\Models\Backend\News;

use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Category\Category;

class News extends Model
{
    //relation with category table
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function gallery(){
        return $this->hasMany(Gallery::class);
    }
}
