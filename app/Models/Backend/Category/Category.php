<?php

namespace App\Models\Backend\Category;

use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\News\News;

class Category extends Model
{
    //relation with product
    public function news(){
        return $this->hasMany(News::class);
    }
}
