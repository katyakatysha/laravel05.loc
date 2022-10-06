<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    #protected $table = 'catalog_categories';
    #protected $primaryKey = 'category_id';

    public function products(){
        return $this->hasMany(Product::class);
    }
}
