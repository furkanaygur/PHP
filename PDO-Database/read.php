<?php require "header.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "elem dont exist";
    header("Refresh:2; url=index.php");
    exit;
}


$query = $db->prepare("SELECT * FROM `example_table` WHERE ID = ? AND Situation = 1");
$query->execute([
    $_GET["id"]
]);

$elem = $query->fetch(PDO::FETCH_ASSOC);

if (!$elem) {
    echo "elem dont exist";
    header("Refresh:2; url=index.php");
    exit;
}

?>

<h3><?php echo $elem["Title"] ?></h3>
<div>
    <?php echo nl2br($elem["Content"]); ?>
    <hr>
    <?php echo $elem["Date"] ?>
    <hr>
    <?php echo $elem["Situation"] ? "Appreoved" : "Unappreoved" ?> <br>
</div>