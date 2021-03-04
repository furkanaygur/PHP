<?php
function adminController($controllerName)
{
    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

function  adminView($viewName)
{
    return PATH . '/admin/view/' . $viewName . '.php';
}

function adminURL($url = false)
{
    return URL . '/admin/' . $url;
}
function adminPublicURL($url = false)
{

    return URL . '/admin/public/' . $url;
}
