<?php require_once "connect.php";
require_once "header.php";

// filter
$_GET = array_map(function ($get) {
    return htmlspecialchars(trim($get));
}, $_GET);


if (!isset($_GET["page"])) {
    $_GET["page"] = "index";
}

switch ($_GET["page"]) {
    case 'index':
        require_once "homepage.php";
        break;
    case 'insert':
        require_once "insert.php";
        break;
    case 'read':
        require_once "read.php";
        break;
    case 'update':
        require_once "update.php";
        break;
    case 'delete':
        require_once "delete.php";
        break;
    case 'for_join':
        require_once "for_join.php";
        break;
    case 'for_join_insert':
        require_once "for_join_insert.php";
        break;
    case 'for_join_elem':
        require_once "for_join_elem.php";
        break;
}
