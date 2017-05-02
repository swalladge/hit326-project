<?php
namespace App\Model;

use Cake\Log\Log;

class Validator
{

    // returns true if $dateStr is a valid date in the format of yyyy-mm-dd
    public static function date($dateStr)
    {
        $d = date_parse_from_format('Y-m-d', $dateStr);
        $res = checkdate($d['month'], $d['day'], $d['year']);
        return $res;
    }
}
