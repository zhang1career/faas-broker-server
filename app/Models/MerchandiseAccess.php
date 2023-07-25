<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchandise extends BaseModel
{
    public $timestamps = false;
    
    protected $fillable = [
        'url',
        'token',
        'field_rule',
    ];

    public function merchandiseAccess()
    {
        return $this->hasOne('App\Models\MerchandiseAccess', 'merch_id', 'id');
    }

}
