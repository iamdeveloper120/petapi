<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function mainCategories()
    {
        return $this->hasMany(MainCategory::class, 'parent_id');
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }
}
