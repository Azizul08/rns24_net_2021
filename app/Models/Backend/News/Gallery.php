<?php

namespace App\Models\Backend\News;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function news(){
        return $this->belongsTo(News::class);
    }
}
