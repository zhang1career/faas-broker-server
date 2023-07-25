<?php

namespace App\Models;


class MerchandiseAccess extends BaseModel
{
    public $timestamps = false;
    
    protected $fillable = [
        'url',
        'token',
        'field_rule',
    ];
}
