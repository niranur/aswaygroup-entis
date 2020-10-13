<?php

function status_string($int)
{
    switch ($int) {
        case 0:
            $bulan = '';
            break;
        case 1:
            $bulan = 'Process';
            break;
        case 2:
            $bulan = 'Review';
            break;
        case 3:
            $bulan = 'Done';
            break;
    }

    return $bulan;
}


function string_to_number($str)
{
    $value = str_replace(',', '', $str);
    return $value;
}

function abbreviation($str)
{
    $acronym = '';
    $word = '';
    $words = preg_split("/(\s|\-|\.)/", $str);
    foreach ($words as $w) {
        $acronym .= substr($w, 0, 1);
    }
    $word = $word . $acronym;
    return $word;
}

function create_code($n)
{
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    srand((double) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= $n) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i ++;
    }
    return strtoupper($pass);
}

function age($tanggal_lahir)
{
    list ($year, $month, $day) = explode("-", $tanggal_lahir);
    $year_diff = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff = date("d") - $day;
    if ($month_diff < 0)
        $year_diff --;
    elseif (($month_diff == 0) && ($day_diff < 0))
        $year_diff --;
    return $year_diff;
}

function count_valid($array_or_countable, $mode = \COUNT_NORMAL)
{
    if ((PHP_VERSION_ID >= 70300 && is_countable($array_or_countable)) || is_array($array_or_countable) || $array_or_countable instanceof Countable) {
        return count($array_or_countable, $mode);
    }

    return null === $array_or_countable ? 0 : 1;
}

function validation_errors_trim($string)
{
    $world = str_replace('.', '', $string);
    $world = str_replace('<p>', '', $world);
    $world = str_replace('</p>', ', ', $world);
    $world = str_replace(',', '<br>', $world);
    return $world;
}

function count_day($first, $second)
{
    $date1 = date_create($first);
    $date2 = date_create($second);

    // difference between two dates
    $diff = date_diff($date1, $date2);

    // count days
    return $diff->format('%a');
}

function status_to_icon($str)
{
    switch ($str) {
        case 'success':
            return 'fa-check';
            break;
        case 'info':
            return 'fa-info';
            break;
        case 'warning':
            return 'fa-exclamation-triangle';
            break;
        case 'danger':
            return 'fa-ban';
            break;
    }
}