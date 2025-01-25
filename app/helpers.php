<?php

use Illuminate\Support\Str;

if (!function_exists('convertRelativePathsToAbsolute')) {
    function convertRelativePathsToAbsolute($content)
    {
        return preg_replace_callback('/src="([^"]+)"/', function ($matches) {
            $url = $matches[1];
            if (!Str::startsWith($url, ['http://', 'https://', '//'])) {
                $url = asset('storage/' . ltrim($url, '/'));
            }
            return 'src="' . $url . '"';
        }, $content);
    }
}
