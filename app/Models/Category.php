<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static mixed $category;
    protected $table = "category";
    protected $filllable = ['name', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function Block()
    {
        return $this->hasMany(Block::class);
    }
}
