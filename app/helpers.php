<?php

function get_valid_locale($requestedLocale)
{
    if (in_array($requestedLocale, config('app.available_locales'), true)) {
        return $requestedLocale;
    }
    return array_first(
        config('app.available_locales'),
        function ($_key, $value) use ($requestedLocale) {
            return starts_with($requestedLocale, $value);
        },
        config('app.fallback_locale')
    );
}
