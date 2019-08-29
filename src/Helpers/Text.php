<?php

namespace App\Helpers;

class Text {
    public static function excerpt(string $text, int $limit = 60)
    {
        if (mb_strlen($text) <= $limit) return $text;

        $lastSpace = strpos($text, ' ', $limit);

        return substr($text, 0, $lastSpace) . '...';
    }
}