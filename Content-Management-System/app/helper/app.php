<?php

function controller($controllerName)
{
    $controllerName = strtolower($controllerName);
    return PATH . '/app/controller/' . $controllerName . '.php';
}

function view($viewName)
{
    return PATH . '/app/view/' . setting('theme') . '/' . $viewName . '.php';
}

function route($index)
{
    global $route;
    return isset($route[$index]) ? $route[$index] : false;
}

function setting($name)
{
    global $settings;
    return isset($settings[$name]) ? $settings[$name] : false;
}
