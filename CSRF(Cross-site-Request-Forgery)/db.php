<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=test", "root", "");

if ($_SERVER["REQUEST_METHOD"] == "POST" && (!isset($_POST["token"]) || $_POST["token"] != $_SESSION["token"])) {
    die("invalid request");
}
$_SESSION["token"] =  uniqid();
