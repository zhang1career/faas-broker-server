<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;


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
        return Merchandise::create($request->all());
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