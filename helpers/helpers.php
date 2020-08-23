<?php
if (!function_exists('getCategories')) {
    function getCategories() :array
    {
        return (new \App\Models\Category())->getAll();
    }
}
