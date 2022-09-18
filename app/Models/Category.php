<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'preview_img', 'is_active', 'description', 'user_id', ];

    // public $id = Auth::id();

    protected $attributes = array(
        'user_id' => 1,
    );

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
}
