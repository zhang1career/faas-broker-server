<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends BaseModel
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'description',
        'url',
        'token',
        'field_rule',
        'suppiler_id',
    ];
}
