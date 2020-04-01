<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function categories() {
        return $this->belongsTo(Category::class, 'id');
    }
    public function mainCategories() {
        return $this->belongsTo(MainCategory::class, 'id');
    }
}
