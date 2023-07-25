<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MerchandiseController extends Controller
{

    public function getAll()
    {
        return Merchandise::getList();
    }


    public function getOne($id)
    {
        return Merchandise::getOne($id);
    }


    public function create(Request $request)
    {
        $param = $request->all();
        Log::info('[create] param:' . json_encode($param));

        $now = time();
        $param['create_time'] = $now;
        $param['update_time'] = $now;

        return Merchandise::create($param);
    }


    public function update(Request $request, $id)
    {
        $item = Merchandise::findOrFail($id);
        $item->update($request->all());

        return $item;
    }


    public function delete(Request $request, $id)
    {
        $item = Merchandise::findOrFail($id);
        $item->delete();

        return 204;
    }
}