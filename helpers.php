<?php

if (!function_exists('getResponseFormat')) {

    function getResponseFormat($path)
    {
        $contents = file_get_contents(realpath(__DIR__) . '/tests/stubs/' . $path);
        return json_decode($contents);
    }
}