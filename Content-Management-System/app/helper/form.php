<?php
function post($name)
{
    if (isset($_POST[$name])) {
        if (is_array($_POST[$name])) {
            return array_map(function ($item) {
                if (is_array($item)) {
                    return array_map(function ($item2) {
                        return htmlspecialchars(trim($item2));
                    }, $item);
                } else {
                    return htmlspecialchars(trim($item));
                }
            }, $_POST[$name]);
        }
        return htmlspecialchars(trim($_POST[$name]));
    }
}
function get($name)
{
    if (isset($_GET[$name])) {
        if (is_array($_GET[$name])) {
            return array_map(function ($item) {
                return htmlspecialchars(trim($item));
            }, $_GET[$name]);
        }
        return htmlspecialchars(trim($_GET[$name]));
    }
}

function form_control(...$except_these)
{
    unset($_POST['submit']);
    $data = [];
    $err = false;
    foreach ($_POST as $key => $value) {
        if (!in_array($key, $except_these) && !post($key)) {
            $err = true;
        } else {
            $data[$key] = post($key);
        }
    }
    if ($err) {
        return false;
    }
    return $data;
}
