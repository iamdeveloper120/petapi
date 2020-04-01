<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    public function categories() {
        return $this->belongsTo(Category::class, 'id');
    }
    public function subCategories() {
        return $this->hasMany(MainCategory::class, 'main_id');
    }
}
