<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public $timestamps = true;

    protected $fillable = [
        'title', 'content', 'user_id', 'file_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
