<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorie extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name'];

    // Relation avec Category
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
    

}
