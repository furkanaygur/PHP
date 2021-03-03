<?php

if (!route(1)) {
    $route[1] = 'index';
}
if (!file_exists(adminController(route(1)))) {
    $route[1] = 'index';
}

require adminController(route(1));
