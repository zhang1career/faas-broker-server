<?php


namespace App\Utils;


class DateUtil
{
    public static function datetimeOf($second) {
        return date("Y-m-d H:i:s", $second);
    }
}