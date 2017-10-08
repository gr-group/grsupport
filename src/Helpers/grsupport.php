<?php

use GRGroup\GRSupport\Facades\Support;

if (!function_exists('profanity')) {
    function profanity()
    {
        Support::profanity();
    }
}

if (!function_exists('profanity_blocker')) {
    function profanity_blocker($str)
    {
        Support::profanityBlocker($str);
    }
}

if (!function_exists('str_html')) {
    function str_html($str)
    {
        Support::strHtml($str);
    }
}

if (!function_exists('str_json')) {
    function str_json($str)
    {
        Support::strJson($str);
    }
}

if (!function_exists('str_alphanumeric')) {
    function str_alphanumeric($str)
    {
        Support::strAlphaNumeric($str);
    }
}

if (!function_exists('only_numbers')) {
    function only_numbers($str)
    {
        Support::onlyNumbers($str);
    }
}

if (!function_exists('number_points')) {
    function number_points($str)
    {
        Support::numberPoints($str);
    }
}

if (!function_exists('random_numbers')) {
    function random_numbers($length = 6)
    {
        Support::randomNumbers($length);
    }
}

if (!function_exists('replace_tags')) {
    function replace_tags($str)
    {
        Support::replaceTags($str);
    }
}

if (!function_exists('file_search')) {
    function file_search($file, $subject)
    {
        Support::fileSearch($file, $subject);
    }
}

if (!function_exists('file_edit')) {
    function file_edit($file, $replace, $subject)
    {
        Support::fileEdit($file, $replace, $subject);
    }
}

if (!function_exists('file_insert')) {
    function file_insert($file, $content)
    {
        Support::fileInsert($file, $content);
    }
}

if (!function_exists('range_hours')) {
    function range_hours($start, $end, $interval = 1, $select = true)
    {
        Support::rangeHours($start, $end, $interval, $select);
    }
}

if (!function_exists('limit_lines')) {
    function limit_lines($str, $lines = 1)
    {
        Support::limtitLines($str, $lines);
    }
}