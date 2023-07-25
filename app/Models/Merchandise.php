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

    public function merchandiseAccess()
    {
        return $this->hasOne('App\Models\MerchandiseAccess', 'merch_id', 'id');
    }

    public function suppiler()
    {
        return $this->belongsTo('App\Models\Merchant', 'suppiler_id', 'id');
    }

}
