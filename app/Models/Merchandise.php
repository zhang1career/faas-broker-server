<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class Merchandise extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'suppiler_id',
    ];

    public function getOne($id)
    {
        $merchandise = DB::table('merchandise')
            ->join('merchandise_access', 'merchandise.id', '=', 'merchandise_access.merch_id')
            ->select('users.*', 'merchandise_access.url', 'merchandise_access.token', 'merchandise_access.field_rule')
            ->where('merchandise.id', $id)
            ->first();

        return $merchandise;
    }
}
