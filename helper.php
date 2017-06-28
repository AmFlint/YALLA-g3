<?php

function changeLocale($locale)
{
    $url = explode($_SERVER['REQUEST_URI'], '/');
    $url[1] = $locale;
    return implode('/', $url);
}
