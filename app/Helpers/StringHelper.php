<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class StringHelper
{
    /**
     * Get the initials from a name (up to 2 characters).
     * Examples:
     * "John Doe" -> "JD"
     * "Alice" -> "A"
     * "Robert Downey Jr:" -> "RD"
     *
     * @param string|null $name
     * @return string
     */
    public static function getInitials(?string $name = 'About Firms'): string
    {
        $words = preg_split('/[\s\-]+/', trim($name));
        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= mb_strtoupper(mb_substr($word, 0, 1));
            }
            if (mb_strlen($initials) >= 2) {
                break;
            }
        }

        return $initials;
    }

    /**
     * Generate a URL-friendly slug.
     * Enforces lowercase and hyphen separation.
     *
     * @param string|null $text
     * @return string
     */
    public static function generateSlug(?string $text): string
    {
        if (empty($text)) {
            return '';
        }

        return Str::slug($text, '-', 'en');
    }
}
