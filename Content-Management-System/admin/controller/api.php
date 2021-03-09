<?php

$json = [];
$route = route(2);


if (file_exists(adminController('api/' . $route))) {
    require adminController('api/' . $route);
}

echo json_encode($json);
