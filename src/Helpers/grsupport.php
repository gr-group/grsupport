<?php
use GRGroup\GRSupport\Facades\Support;

if (!function_exists('profanity')) {
    function profanity()
    {
        return Support::profanity();
    }
}

if (!function_exists('profanity_blocker')) {
    function profanity_blocker($str)
    {
        return Support::profanityBlocker($str);
    }
}

if (!function_exists('str_html')) {
    function str_html($str)
    {
        return Support::strHtml($str);
    }
}

if (!function_exists('str_json')) {
    function str_json($str)
    {
        return Support::strJson($str);
    }
}

if (!function_exists('str_alphanumeric')) {
    function str_alphanumeric($str)
    {
        return Support::strAlphaNumeric($str);
    }
}

if (!function_exists('only_numbers')) {
    function only_numbers($str)
    {
        return Support::onlyNumbers($str);
    }
}

if (!function_exists('number_points')) {
    function number_points($str)
    {
        return Support::numbersPoints($str);
    }
}

if (!function_exists('random_numbers')) {
    function random_numbers($length = 6)
    {
        return Support::randomNumbers($length);
    }
}

if (!function_exists('rpl_tags')) {
    function rpl_tags($str, $tags)
    {
        return Support::replaceTags($str, $tags);
    }
}

if (!function_exists('file_search')) {
    function file_search($file, $subject)
    {
        return Support::fileSearch($file, $subject);
    }
}

if (!function_exists('file_edit')) {
    function file_edit($file, $replace, $subject)
    {
        return Support::fileEdit($file, $replace, $subject);
    }
}

if (!function_exists('file_insert')) {
    function file_insert($file, $content)
    {
        return Support::fileInsert($file, $content);
    }
}

if (!function_exists('range_hours')) {
    function range_hours($start, $end, $interval = 1, $select = true)
    {
        return Support::rangeHours($start, $end, $interval, $select);
    }
}

if (!function_exists('limit_lines')) {
    function limit_lines($str, $lines = 1)
    {
        return Support::limtitLines($str, $lines);
    }
}

if (!function_exists('url_parser')) {
    function url_parser($str, $rule)
    {
        return Support::urlParser($str, $rule);
    }
}