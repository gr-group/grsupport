<?php

namespace GRGroup\GRSupport\Classes;

use ConsoleTVs\Profanity\Builder as ProfanityBuilder;
use Jenssegers\Agent\Agent;
use Nahid\Linkify\Linkify;

class Support
{
    /**
     * Start Jenssegers Agent
     * @return Jenssegers\Agent\Agent
     */
    public function agent($arg = null)
    {
        $agent = new Agent();

        if ($arg) {
            return $agent->is($arg);
        }
        
        return new Agent();
    }

    /**
     * Start Profanity
     * @return ConsoleTVs\Profanity\Builder
     */
    public function profanity()
    {
        return new ProfanityBuilder;
    }

    /**
     * Profanity Blocker
     * @param 	string 	$str
     * @return string
     */
    public function profanityBlocker($str)
    {
        return ProfanityBuilder::blocker($str)->filter();
    }

    /**
     * Get auth request by guard
     * @param 	string 	$guard 	Web / Api
     * @return Illuminate\Database\Eloquent\Model
     */
    public function authRequest($guard = null)
    {
        return is_null($guard) ? request()->user() ?? request()->user('api') : request()->user($guard);
    }

    /**
     * Verify string is html
     * @param  string $str
     * @return boolean
     */
    public function strHtml($str)
    {
        if ($str != strip_tags($str)) {
            return true;
        }

        return false;
    }

    /**
     * Verify string is json
     * @param  string $str
     * @return boolean
     */
    public function strJson($str)
    {
        json_decode($str);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * Only alpha numeric
     * @param  string $str
     * @return string
     */
    public function strAlphaNumeric($str)
    {
        return preg_replace("/[^a-zA-Z0-9]+/", "", $str);
    }

    /**
     * Only numbers in string
     * @param  string $str
     * @return string
     */
    public function onlyNumbers($str)
    {
        return preg_replace('/[^0-9]+/', '', $str);
    }

    /**
     * Only numbers and points
     * @param  string $str
     * @return string
     */
    public function numbersPoints($str)
    {
        $str = preg_replace("/[^ \w]+/", ".", $str);
        $str = preg_replace('/[a-zA-Z_ \/+]/', '0', $str);
        return $str;
    }

    /**
     * Generate random numbers
     * @param  integer $length
     * @return string
     */
    public function randomNumbers($length = 6)
    {
        $nums = '0123456789';

        $out = $nums[mt_rand(1, strlen($nums)-1)];

        for ($p = 0; $p < $length-1; $p++) {
            $out .= $nums[mt_rand(0, strlen($nums)-1)];
        }

        return $out;
    }

    /**
     * Replace tags in string using {tag}
     * @param  string $str
     * @param  array $tags
     * @return string
     */
    public function replaceTags($str, $tags)
    {
        return preg_replace_callback(
            '/\\{([^{}]+)\}/',
            function ($matches) use ($tags) {
                return array_key_exists($matches[1], $tags)
                ? $tags[$matches[1]]
                : '';
            },
            $str
        );
    }

    /**
     * Search for a content within a file
     * @param  string $file
     * @param  string $subject
     * @return boolean
     */
    public function fileSearch($file, $subject)
    {
        return str_contains(file_get_contents(str_contains($file, '/') ? $file : $file), $subject);
    }

    /**
     * Edit part of the contents of a file
     * @param  string $file
     * @param  string $replace
     * @param  string $subject
     * @return void
     */
    public function fileEdit($file, $replace, $subject)
    {
        file_put_contents($file, str_replace(
            "$replace",
            "$subject",
            file_get_contents($file)
        ));
    }

    /**
     * Insert content at the end of a file
     * @param  string $file
     * @param  string $content
     * @return void
     */
    public function fileInsert($file, $content)
    {
        file_put_contents(
            $file,
            $content,
            FILE_APPEND
        );
    }

    /**
     * Interval between two hours
     * @param  string  $start  	 01:00:00
     * @param  string  $end    	 23:00:00
     * @param  integer $interval Interval in hours
     * @param  boolean $select 	 For use in select of a form or array only
     * @return array
     */
    public function rangeHours($start, $end, $interval = 1, $select = true)
    {
        $tStart = strtotime($start);
        $tEnd = strtotime($end);
        $tNow = $tStart;

        $hours = [];
        while ($tNow <= $tEnd) {
            $hours[] = date("H:i", $tNow);
            $tNow = strtotime('+'.$interval.' hour', $tNow);
        }

        if ($select) {
            $hours = collect($hours)->map(function ($item) {
                return [
                    $item => $item
                ];
            })->collapse()->all();
        }

        return $hours;
    }

    /**
     * Limits the amount of line breaks in a textarea
     * @param  string  $str
     * @param  integer $lines Number of lines to be limited
     * @return string
     */
    public function limtitLines($str, $lines = 1)
    {
        $line = "\n";
        for ($i=2; $i<=$lines; $i++) {
            $line .= "\n";
        }
        return preg_replace("/[\r\n]+/", "$line", $str);
    }

    /**
     * Parse URLs from string
     * @param  string $str
     * @param  string $rule substitution rule, for example: <a href="[url]">[caption]</a>
     * @return string
     */
    public function urlParser($str, $rule)
    {
        $linkify = new Linkify(['callback' => function ($url, $caption, $isEmail) use ($rule) {
            $rule = str_replace('[url]', $url, $rule);
            $rule = str_replace('[caption]', $caption, $rule);
            return $rule;
        }]);

        return $linkify->process($str);
    }

    /**
     * Clean html strings in request using pack Mews/Purifier with clean helper
     * @param  array $request
     * @return void
     */
    public function cleanHtmlStringsFromRequest($request)
    {
    	$r = [];

    	foreach($request->all() as $key => $value){
            if(is_string($value)){
                $r[$key] = clean($value);
            }else{
                $r[$key] = $value;
            }

            $request->request->replace($r);
        }
    }
}
