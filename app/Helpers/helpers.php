<?php

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}
