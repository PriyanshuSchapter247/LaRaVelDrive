<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Block extends Model
{
    use HasFactory;

    protected $table = "block";
    protected $filllable = ['name', 'category_name', 'notes', 'image', 'category_id', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function categoryName()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
