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
        $merchandise = DB::table('merchandise')
            ->join('merchant', 'merchandise.supplier_id', '=', 'merchant.id')
            ->select('merchandise.*', 'merchant.name as supplier')
            ->get();

        return $merchandise;
    }

    public static function getOne($id)
    {
        $merchandise = DB::table('merchandise')
            ->join('merchandise_access', 'merchandise.id', '=', 'merchandise_access.merch_id')
            ->select('merchandise.*', 'merchandise_access.url', 'merchandise_access.token', 'merchandise_access.field_rule')
            ->where('merchandise.id', $id)
            ->first();

        return $merchandise;
    }
}
