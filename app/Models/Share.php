<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;

    protected $table = "share";
    protected $filllable = ['send_from', 'send_to', 'send_image', 'status', 'url'];


// Relation Share BelongsTo User
    public function User()
    {
        return $this->belongsTo(User::class, 'send_to', 'id');
    }

}
