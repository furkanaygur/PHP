<?php
function siteURL($url = false)
{
    return URL . '/' . $url;
}
function publicURL($url = false)
{
    echo URL . '/public/' . $url;
    return URL . '/public/' . $url;
}
