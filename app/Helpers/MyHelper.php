<?php
use Carbon\Carbon;

if (!function_exists('convert_price')) {
    function convert_price(string $price = '')
    {
        return str_replace('.', '', $price);
    }
}


if (!function_exists('convert_date')) {
    function convert_date(string $date = '')
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}


if(!function_exists('convert_array'))
{
    function convert_array($systems = null, $keyword = '', $value = '')
    {
        $temp = [];
        if(is_array($systems))
        {
            foreach ($systems as $key => $val) {
                $temp[$val[$keyword]] = $val[$value];
            }
        }

        if(is_object($systems))
        {
            foreach ($systems as $key => $val) {
                // dd($val); 
                $temp[$val->{$keyword}] = $val->{$value};
            }
        }

        return $temp;
    }
}
