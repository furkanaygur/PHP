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

function user_ranks($rankID = null)
{
    $ranks = [
        '1' => "Admin",
        '2' => 'Moderator',
        '3' => 'User'
    ];
    return $rankID ? $ranks[$rankID] : $ranks;
}
