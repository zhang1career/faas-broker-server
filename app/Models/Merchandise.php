<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected array $fillable = [
        'name',
        'description',
        'url',
        'token',
        'field_info',
        'suppiler_id',
    ];
}
