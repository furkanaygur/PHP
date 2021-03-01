<?php
require "db.php";

$id = 1;
$name = $_POST["name"];

$query = $db->prepare("UPDATE test SET name = ? WHERE id = ?");
$query->execute([$name, $id]);

header("Location:index.php");
