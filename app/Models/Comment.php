<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public $timestamps = false;

    protected $fillable = [
        'title', 'content', 'user_id', 'file_id'
    ];
}
