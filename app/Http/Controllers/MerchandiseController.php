<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;


class MerchandiseController extends Controller
{

    public function getAll()
    {
        return Merchandise::all();
    }


    public function getOne($id)
    {
        return Merchandise::find($id);
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