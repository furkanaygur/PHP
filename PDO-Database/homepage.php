<h3>List</h3>

<form action="" method="$_GET">
    <input type="text" class="datepicker" name="start" value="<?php echo isset($_GET["start"]) ? $_GET["start"] : ""; ?>" placeholder="Start">
    <input type="text" class="datepicker" name="end" value="<?php echo isset($_GET["end"]) ? $_GET["end"] : ""; ?>" placeholder="End"> <br> <br>
    <input type="text" name="search" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : ""; ?>" placeholder=" Search">
    <button type="submit">Search</button>
</form>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    });
</script>



<?php
// $query = $db->prepare("SELECT * FROM `example_table`");
// $query->execute();
// $elems = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($elems);
$sql = "SELECT `example_table`.`ID`, `example_table`.`Title`, `example_table`.`Content`, GROUP_CONCAT(`table_for_join`.`name`) as for_table_name, GROUP_CONCAT(`table_for_join`.`ID`) as for_table_name_id, `example_table`.`Situation`
FROM example_table INNER JOIN table_for_join ON FIND_IN_SET(`table_for_join`.`ID`, `example_table`.`for_join_ID`)";


$where = [];

if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $where[] = ' (`example_table`.`Title` LIKE "%' . $_GET["search"] . '%" || `example_table`.`Content` LIKE "%' . $_GET["search"] . '%") ';
}
if (isset($_GET["start"]) && !empty($_GET["start"]) && isset($_GET["end"]) && !empty($_GET["end"])) {
    $where[] = ' `example_table`.`Date` BETWEEN "' . $_GET["start"] . ' 00:00:00" AND "' . $_GET["end"] . ' 23:59:59" ';
}
if (count($where) > 0) {
    $sql .= " WHERE " . implode("&&", $where);
}
$sql .= "GROUP BY `example_table`.`for_join_ID` ORDER BY `example_table`.`ID` DESC";

$elems = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if ($elems) : ?>
    <ul>
        <?php foreach ($elems as $elem) : ?>

            <li>
                <?php echo $elem["Title"];
                $elemsName =  explode(',', $elem["for_table_name"]);
                $elemsID =  explode(',', $elem["for_table_name_id"]);
                foreach ($elemsName as $index => $name) :
                ?>
                    (<a href="?page=for_join_elem&id=<?php echo $elemsID[$index]; ?>"><?php echo $name; ?></a>)
                <?php endforeach; ?>
                <div>
                    <?php if ($elem["Situation"] == 1) : ?>
                        <a href="?page=read&id=<?php echo $elem["ID"] ?>">[Read]</a>
                    <?php endif; ?>
                    <a href="?page=update&id=<?php echo $elem["ID"] ?>">[Update]</a>
                    <a href="?page=delete&id=<?php echo $elem["ID"] ?>">[Delete]</a>
                </div>
                <br>
            </li>

        <?php endforeach; ?>

    </ul>
<?php else : ?>
    <?php if (isset($_GET["search"])) : ?>
        <div style="color:red;">Dont Found</div>
    <?php else : ?>
        <div style="color:red;">Empty</div>
    <?php endif; ?>
<?php endif; ?>