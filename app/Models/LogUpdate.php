<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogUpdate extends Model
{
    protected $fillable = [
        'albums_id',
        'users_id',
    ];
    use HasFactory;

}
