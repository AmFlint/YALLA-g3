<?php

function changeLocale($locale)
{
    $url = explode($_SERVER['REQUEST_URI'], '/');
    $url[1] = $locale;
    return implode('/', $url);
}

function getCurrentNavPosition($url)
{
    if (str_contains($_SERVER['REQUEST_URI'], $url)) {
        return 'active';
    } elseif ($_SERVER['REQUEST_URI'] == '/admin' && $url == 'dashboard') {
        return 'active';
    }
}
