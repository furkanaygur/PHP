<?php

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "elem dont exist";
    header("Refresh:3; url=index.php");
}

$query = $db->prepare("DELETE FROM `example_table` WHERE ID = ?");
$query->execute([
    $_GET["id"]
]);

if ($query) {
    echo "Successfuly deleted";
    header("Location:index.php");
}
