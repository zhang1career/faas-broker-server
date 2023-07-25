<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Services\MerchandiseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MerchandiseController extends Controller
{

    /**
     * @var MerchandiseService
     */
    private MerchandiseService $merchandiseService;


    public function __construct(MerchandiseService $merchandiseService)
    {
        $this->merchandiseService = $merchandiseService;
    }


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

        return $this->merchandiseService->create($param);
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