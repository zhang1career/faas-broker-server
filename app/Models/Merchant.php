<?php

namespace App\Models;


class Merchant extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
