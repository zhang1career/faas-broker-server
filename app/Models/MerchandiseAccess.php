<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class MerchandiseAccess extends Model
{
    public $timestamps = false;

    protected $table = 'merchandise_access';

    protected $fillable = [
        'url',
        'token',
        'field_rule',
    ];
}
