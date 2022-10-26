<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'price', 'active', 'category_id'];

    public function getImageAttribute(): string
    {
        $image = $this->attributes['image'];
        if($image){
            if(Str::startsWith($image, 'http')){
                return $image;
            }else{
                if(Storage::exists($image)) {
                    return Storage::url($image);
                }
                return "https://klike.net/uploads/posts/2019-05/1556708032_1.jpg";
            }
        }
        return "https://klike.net/uploads/posts/2019-05/1556708032_1.jpg";
    }

    public function setImageAttribute($value){
        $this->attributes['image'] = Str::lower($value);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
