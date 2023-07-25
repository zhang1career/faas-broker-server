<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Merchant extends Model
{
    public $timestamps = false;

    protected $table = 'merchant';

    protected $fillable = [
        'name',
    ];
}
