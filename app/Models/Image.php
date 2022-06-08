<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "Image";
    protected $filllable = ['imagename', 'created_by'];

    protected $dates = ['deleted_at'];

// Relation Image BelongsTO User
    public function User()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function Share()
    {
        return $this->hasMany(Share::class,'send_image','id');
    }

}
