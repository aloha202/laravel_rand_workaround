<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'written_at' => 'datetime'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
