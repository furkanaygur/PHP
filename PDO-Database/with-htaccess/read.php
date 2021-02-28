<?php

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "ID value not found";
    header("Refresh:2; url=index");
    exit;
}

$query = $db->prepare(
    "SELECT `example_table`.`ID`, `example_table`.`Title`, `example_table`.`Content`, GROUP_CONCAT(`table_for_join`.`name`) as for_table_name, `example_table`.`Situation`, `example_table`.`Date`
    FROM example_table INNER JOIN table_for_join ON FIND_IN_SET(`table_for_join`.`ID`, `example_table`.`for_join_ID`) WHERE `example_table`.`ID`= ? AND `example_table`.`Situation` = 1 GROUP BY `example_table`.`for_join_ID` "
);

$query->execute([
    $_GET["id"]
]);

$elems = $query->fetch(PDO::FETCH_ASSOC);

if (!$elems) {
    echo "elems dont exist";
    header("Refresh:2; url=index");
    exit;
}

?>

<h3><?php echo $elems["Title"] ?></h3>
<?php $elemsName =  explode(',', $elems["for_table_name"]); ?>
<?php foreach ($elemsName as $elem) : ?>
    <h5 style="display: inline;">(<?php echo $elem ?>)</h5>
<?php endforeach; ?>
<div style="margin-top: 1rem;">
    <?php echo nl2br($elems["Content"]); ?>
    <hr>
    <?php echo $elems["Date"] ?>
    <hr>
    <?php echo $elems["Situation"] ? "Appreoved" : "Unappreoved" ?> <br>
</div>