<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
