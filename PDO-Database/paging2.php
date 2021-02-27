<?php
$db = new PDO('mysql:host=localhost;dbname=test', 'root', '');

$limit = 10;
$start = isset($_GET["start"]) && is_numeric($_GET["start"]) && $_GET["start"] > -1 ? $_GET["start"] : 0;

if ($start % $limit !== 0) {
    header('Location:paging2.php');
}

$query = $db->query('SELECT * FROM `test` ORDER BY id DESC LIMIT ' . $start . ',' . $limit)->fetchAll(PDO::FETCH_ASSOC);

if (!$query) {
    header('Location:paging2.php?start=' . $start - $limit . '&end=1');
}

foreach ($query as $elem) {
    echo $elem["id"] . " => " . $elem["name"] . "<br>";
}

if ($start > 0) {
    echo '<a style="margin-right:1rem;" href="paging2.php?start=' . ($start - $limit) . '">Previous</a>';
}

if (!isset($_GET["end"])) {
    echo '<a " href="paging2.php?start=' . ($start + $limit) . '">Next</a>';
}
