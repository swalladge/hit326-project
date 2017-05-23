<?php
namespace App\Model;

use Cake\Log\Log;

class Validator
{

    // returns true if $dateStr is a valid date in the format of yyyy-mm-dd
    public static function date($dateStr)
    {
        $d = date_parse_from_format('Y-m-d', $dateStr);
        $ok = checkdate($d['month'], $d['day'], $d['year']);
        $has_errors = $d['error_count'] > 0;
        return $ok && !$has_errors;
    }

    // returns true if $dateStr is a valid datetime in the format of yyyy-mm-dd HH:MM
    public static function datetime($dateStr)
    {
        $d = date_parse_from_format('Y-m-d H:i', $dateStr);
        $ok = checkdate($d['month'], $d['day'], $d['year']);
        $has_errors = $d['error_count'] > 0;
        return $ok && !$has_errors;
    }

    // returns true if $dateStr is a valid datetime in the format of yyyy-mm-dd HH:MM
    public static function validTime($dateStr)
    {
        $d = date_parse_from_format('H:i', $dateStr);
        $has_errors = $d['error_count'] > 0;
        return !$has_errors;
    }

}
