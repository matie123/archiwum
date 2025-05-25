<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    public $timestamps = true;

    protected $fillable = [
        'name', 'extension', 'path', 'user_id', 'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
