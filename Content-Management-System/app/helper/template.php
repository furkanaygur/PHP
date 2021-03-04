<?php
function siteURL($url = false)
{
    return URL . '/' . $url;
}
function publicURL($url = false)
{
    return URL . '/public/' . setting('theme') . '/' . $url;
}

function error()
{
    global $error;
    return isset($error) ? $error : '';
}

function success()
{
    global $success;
    return isset($success) ? $success : '';
}
