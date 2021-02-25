<?php require "header.php" ?>

<h3>List</h3>
<?php
// $query = $db->prepare("SELECT * FROM `example_table`");
// $query->execute();
// $elems = $query->fetchAll(PDO::FETCH_ASSOC);
// print_r($elems);

$elems = $db->query("SELECT * FROM `example_table`")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if ($elems) : ?>
    <ul>
        <?php foreach ($elems as $elem) : ?>

            <li>
                <?php echo $elem["Title"] ?>
                <?php if ($elem["Situation"] == 1) : ?>
                    <a href="?page=read&id=<?php echo $elem["ID"] ?>">[Read]</a>
                <?php endif; ?>
                <a href="?page=update&id=<?php echo $elem["ID"] ?>">[Update]</a>
                <a href="?page=delete&id=<?php echo $elem["ID"] ?>">[Delete]</a>

            </li>

        <?php endforeach; ?>

    </ul>
<?php else : ?>
    <div style="color:red;">Empty</div>
<?php endif; ?>