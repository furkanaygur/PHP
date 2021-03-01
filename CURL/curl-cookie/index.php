<?php
session_start();


if (!isset($_SESSION["login"])) {
    require __DIR__ . '/login.php';
} else {
    require __DIR__ . '/home.php';
}
