<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'image', 'active', 'category_id'];
    public function getImageAttribute():string
    {
       $image =  $this->attributes['image'];
        if ($image){
            if (Str::startsWith($image, 'http')){
                return $image;
            }else{
                Storage::url($image);
            }
        }
        return'https://img2.akspic.ru/previews/9/0/9/8/6/168909/168909-ballonchik-graffiti-ulichnoe_iskusstvo-svet-purpur-500x.jpg';
    }

}
