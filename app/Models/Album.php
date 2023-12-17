<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'artist',
    ];
    use HasFactory;
}
