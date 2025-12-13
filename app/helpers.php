<?php

use Illuminate\Support\Carbon;

if (! function_exists('daysAgo')) {
    /**
     * Return a humanized time difference like "2 hours ago" or fallback to formatted date.
     *
     * @param  \DateTimeInterface|string|null  $date
     * @param  string  $fallbackFormat  PHP date format used when diff cannot be computed
     * @return string
     */
    function daysAgo($date, string $fallbackFormat = 'd M Y') : string
    {
        try {
            if ($date instanceof \DateTimeInterface) {
                $carbon = Carbon::instance($date);
            } elseif (is_string($date) && $date !== '') {
                $carbon = Carbon::parse($date);
            } else {
                return '';
            }

            // If the date is very old/new, diffForHumans handles humanized text
            return $carbon->diffForHumans();
        } catch (\Throwable $e) {
            // Fallback: try simple formatting if possible
            try {
                $carbon = Carbon::parse((string) $date);
                return $carbon->format($fallbackFormat);
            } catch (\Throwable $e2) {
                return '';
            }
        }
    }
}
