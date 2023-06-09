<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['category_id','subcategory_id','name','company','detail','photo'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
