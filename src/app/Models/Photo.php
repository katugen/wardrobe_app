<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['clothes_id', 'file_path', 'caption'];

    public function clothes()
    {
        return $this->belongsTo(Clothes::class);
    }
}
