<?php

namespace App\Support;

use App\Models\Content;

class Cms
{
    protected static ?array $cache = null;

    /** key = "page.field" e.g. "home.hero_title_1". Falls back to the default in config/cms.php */
    public static function get(string $key)
    {
        if (self::$cache === null) {
            try { self::$cache = Content::pluck('value', 'key')->all(); }
            catch (\Throwable $e) { self::$cache = []; }
        }
        $v = self::$cache[$key] ?? null;
        if ($v === null || $v === '') {
            [$page, $field] = explode('.', $key, 2);
            $v = config("cms.pages.$page.fields.$field.2");
        }
        return $v;
    }
}
