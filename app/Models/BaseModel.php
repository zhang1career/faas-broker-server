<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    //删除s
    public function getTable()
    {
        $table = parent::getTable();
        return substr($table, 0, -1);
    }
}
