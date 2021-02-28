<?php
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "ID value not found";
    header("Refresh:3; url=index");
    exit;
}

$query = $db->prepare("SELECT * FROM table_for_join WHERE ID = ?");
$query->execute([
    $_GET["id"]
]);
$categories = $query->fetch(PDO::FETCH_ASSOC);
if (!$categories) {
    echo "Element not found";
    header("Refresh:3; url=index");
    exit;
}


$query2 = $db->prepare("SELECT * FROM example_table WHERE FIND_IN_SET(?, for_join_ID) ORDER BY ID DESC ");
$query2->execute([
    $categories["ID"]
]);

$elems = $query2->fetchAll(PDO::FETCH_ASSOC);


?>

<h2><?php echo $categories["name"]; ?></h2>
<hr>

<?php if ($elems) : ?>
    <ul>
        <?php foreach ($elems as $elem) : ?>
            <li>
                <?php echo $elem["Title"]  ?>
                <div>
                    <?php if ($elem["Situation"] == 1) : ?>
                        <a href="read<?php echo $elem["ID"] ?>">[Read]</a>
                    <?php endif; ?>
                    <a href="update<?php echo $elem["ID"] ?>">[Update]</a>
                    <a href="delete<?php echo $elem["ID"] ?>">[Delete]</a>
                </div>
                <br>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <h5 style="color:red">Empty</h5>
<?php endif; ?>