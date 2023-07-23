<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'url',
        'token',
        'field_info',
        'suppiler_id',
    ];
}
