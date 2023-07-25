<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;


class MerchandiseController extends Controller
{

    public function getAll()
    {
        $merchandiseList = Merchandise::all();
        $ret = [];
        foreach ($merchandiseList as $merchandise) {
            $ret += $this->buildBrief($merchandise);
        }

        return $ret;
    }

    private function buildBrief(Merchandise $merchandise) : array
    {
        return [
            'id'            => $merchandise->id,
            'name'          => $merchandise->name,
            'description'   => $merchandise->description,
            'supplier_id'   => $merchandise->supplier_id,
        ];
    }


    public function getOne($id)
    {
        $merchandise = Merchandise::find($id);
        return $this->buildDetail($merchandise);
    }

    private function buildDetail(Merchandise $merchandise) : array
    {
        return [
            'id'            => $merchandise->id,
            'name'          => $merchandise->name,
            'description'   => $merchandise->description,
            'supplier_id'   => $merchandise->supplier_id,
            'access'        => $merchandise->merchandiseAccess(),
        ];
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