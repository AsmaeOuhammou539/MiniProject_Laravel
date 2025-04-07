<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
        'name',
        'description',
        'price',
        'phone_number',
        'ville',
        'image_url',
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategorie::class, 'sub_category_id');
    }
    public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'favorites')
        ->withTimestamps();
}
}
