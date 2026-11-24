<?php

use App\Support\Cms;

if (!function_exists('cms')) {
    function cms(string $key) { return Cms::get($key); }
}
if (!function_exists('lines')) {
    function lines($text): array {
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $text)), 'strlen'));
    }
}
if (!function_exists('cms_lines')) {
    // "a|b|c" per line  ->  [['a','b','c'], ...]
    function cms_lines(string $key): array {
        return array_map(fn ($l) => array_map('trim', explode('|', $l)), lines(cms($key)));
    }
}
if (!function_exists('img')) {
    function img($path) {
        if (!$path) return null;
        return str_starts_with($path, 'images/') ? asset($path) : asset('storage/' . $path);
    }
}
