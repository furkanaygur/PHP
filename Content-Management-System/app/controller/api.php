<?php

$json = [];
$route = route(1);

if (file_exists(controller('api/' . $route))) {
    require controller('api/' . $route);
}

echo json_encode($json);
