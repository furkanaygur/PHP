<a href="for_join_insert"> [Second Add Content] </a>
<hr>
<h3>Second Page</h3>
<?php

$elems = $db->query("SELECT `table_for_join`.* , COUNT(example_table.ID) as Total FROM `table_for_join`
LEFT JOIN `example_table` ON FIND_IN_SET(`table_for_join`.`ID`,`example_table`.`for_join_ID`) 
GROUP BY `table_for_join`.ID
 ")->fetchAll(PDO::FETCH_ASSOC);

?>

<ul>
    <?php foreach ($elems as $elem) : ?>
        <li>
            <a href="for_join_elem<?php echo $elem["ID"]; ?>">
                <?php echo $elem["name"] ?>
                (<?php echo $elem["Total"] ?>)
            </a>
        </li>
    <?php endforeach; ?>
</ul>