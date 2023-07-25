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


    public static function getList()
    {
        $merchandise = DB::table('merchandise as m')
            ->join('merchant as t', 'm.supplier_id', '=', 't.id')
            ->select('m.*', 't.name as supplier')
            ->get();

        return $merchandise;
    }

    public static function getOne($id)
    {
        $merchandise = DB::table('merchandise as m')
            ->join('merchandise_access as ma', 'm.id', '=', 'ma.merch_id')
            ->select('m.*', 'ma.url', 'ma.token', 'ma.field_rule')
            ->where('m.id', $id)
            ->first();

        return $merchandise;
    }
}
