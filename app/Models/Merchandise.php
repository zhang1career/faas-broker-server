<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'suppiler_id',
    ];
}
