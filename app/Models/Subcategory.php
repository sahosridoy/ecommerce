<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'preview_img', 'is_active', 'description'];


    public function categories(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
