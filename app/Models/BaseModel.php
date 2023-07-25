<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{

    /**
     * 重载表名getter
     * 删除表名后缀s
     *
     * @return false|string
     */
    public function getTable()
    {
        $table = parent::getTable();
        return substr($table, 0, -1);
    }
}
