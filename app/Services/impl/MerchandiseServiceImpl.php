<?php

namespace App\Services\impl;

use App\Models\Merchandise;
use App\Services\MerchandiseService;

class MerchandiseServiceImpl implements MerchandiseService
{

    public function create(array $param) {
        $now = time();
        $param['create_time'] = $now;
        $param['update_time'] = $now;

        return Merchandise::create($param);
    }
}