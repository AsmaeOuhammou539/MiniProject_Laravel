<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['name'];

    // Category.php
    public function subcategories()
    {
        return $this->hasMany(Subcategorie::class, 'category_id');
    }

}
