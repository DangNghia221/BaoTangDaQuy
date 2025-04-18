<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libary extends Model
{
    protected $table = 'libaries';

    protected $fillable = [
        'filename',
        'path',
    ];
}
