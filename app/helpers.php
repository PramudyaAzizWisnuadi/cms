<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

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

if (!function_exists('versionedAsset')) {
    function versionedAsset($path)
    {
        $version = Cache::remember('asset_version_' . $path, 3600, function () use ($path) {
            $fullPath = public_path($path);
            return file_exists($fullPath) ? filemtime($fullPath) : time();
        });

        return asset($path) . '?v=' . $version;
    }
}

if (!function_exists('optimizedImage')) {
    function optimizedImage($src, $alt = '', $class = '', $width = null, $height = null, $loading = 'lazy')
    {
        $attributes = [
            'src' => $src,
            'alt' => $alt,
            'loading' => $loading,
            'decoding' => 'async',
            'class' => $class
        ];

        if ($width) $attributes['width'] = $width;
        if ($height) $attributes['height'] = $height;

        $attr_string = '';
        foreach ($attributes as $key => $value) {
            if ($value !== null && $value !== '') {
                $attr_string .= $key . '="' . htmlspecialchars($value) . '" ';
            }
        }

        return '<img ' . trim($attr_string) . '>';
    }
}

if (!function_exists('criticalCSS')) {
    function criticalCSS()
    {
        return '
        <style>
            /* Critical CSS */
            body { font-family: -apple-system, BlinkMacSystemFont, sans-serif; margin: 0; }
            .hero-section { min-height: 50vh; }
            .navbar { background: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
            .btn { padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; }
            .card { border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
            .container { max-width: 1200px; margin: 0 auto; padding: 0 15px; }
            .row { display: flex; flex-wrap: wrap; margin: 0 -15px; }
            .col-lg-3, .col-sm-6 { padding: 0 15px; }
            @media (min-width: 992px) { .col-lg-3 { flex: 0 0 25%; } }
            @media (min-width: 576px) { .col-sm-6 { flex: 0 0 50%; } }
        </style>';
    }
}
