<?php
function siteURL($url = false)
{
    return URL . '/' . $url;
}
function publicURL($url = false)
{
    return URL . '/public/' . setting('theme') . '/' . $url;
}
