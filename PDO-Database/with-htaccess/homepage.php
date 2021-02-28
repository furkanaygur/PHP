<h3>List</h3>
<!-- search with date -->
<form action="" method="$_GET">
    <input type="text" class="datepicker" name="start" value="<?php echo isset($_GET["start"]) ? $_GET["start"] : ""; ?>" placeholder="Start">
    <input type="text" class="datepicker" name="end" value="<?php echo isset($_GET["end"]) ? $_GET["end"] : ""; ?>" placeholder="End"> <br> <br>
    <input type="text" name="search" value="<?php echo isset($_GET["search"]) ? $_GET["search"] : ""; ?>" placeholder=" Search">
    <button type="submit">Search</button>
</form>
<!-- search with date end -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    });
</script>



<?php

// paging
$limit = 5;
$pageCount = isset($_GET["pagecount"]) && is_numeric($_GET["pagecount"]) ? ($_GET["pagecount"] > 0 ? $_GET["pagecount"] : 1) : 1;
$elemsCount = $db->query("SELECT count(ID) as total FROM `example_table`")->fetch(PDO::FETCH_ASSOC)["total"];
$totalPage =  ceil($elemsCount / $limit);
$start = ($pageCount * $limit) - $limit;

$left = $pageCount - 3;
$right = $pageCount + 3;

if ($left <= 3) {
    $right = 7;
}
if ($right > $totalPage) {
    $left = $totalPage - 6;
}
// paging end


// database & sql
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
$sql .= " GROUP BY `example_table`.`ID` ORDER BY `example_table`.`ID` DESC LIMIT $start , $limit";

$elems = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// database & sql end



?>

<!-- Listing Elements -->
<?php if ($elems) : ?>
    <!--  ul -->
    <ul>
        <!-- foreach -->
        <?php foreach ($elems as $elem) : ?>
            <!-- li -->
            <li>
                <?php echo $elem["Title"];
                $elemsName =  explode(',', $elem["for_table_name"]);
                $elemsID =  explode(',', $elem["for_table_name_id"]);
                // foreach
                foreach ($elemsName as $index => $name) :
                ?>
                    (<a href="for_join_elem<?php echo $elemsID[$index]; ?>"><?php echo $name; ?></a>)
                <?php endforeach; ?>
                <!-- foreach end -->
                <!-- div -->
                <div>
                    <?php if ($elem["Situation"] == 1) : ?>
                        <a href="read<?php echo $elem["ID"] ?>">[Read]</a>
                    <?php endif; ?>
                    <a href="update<?php echo $elem["ID"] ?>">[Update]</a>
                    <a href="delete<?php echo $elem["ID"] ?>">[Delete]</a>
                </div>
                <!-- div end -->
                <br>
            </li>
            <!-- li end -->
        <?php endforeach; ?>
        <!-- foreach end -->
    </ul>
    <!-- ul end -->

    <!-- paging -->
    <ul class="pages">
        <li class="btn"><a href="pagecount<?php echo  $pageCount > 1 ? $pageCount - 1 : "1"; ?>">Previous</a></li>
        <?php for ($i = $left; $i <=  $right; $i++) : ?>
            <?php if ($i > 0 && $i <= $totalPage) : ?>
                <li class="link-elem"> <a class="<?php echo $i == $pageCount ? "active" : "" ?>" href="pagecount<?php echo $i  ?>"><?php echo $i ?></a> </li>
            <?php endif; ?>
        <?php endfor; ?>
        <li class="btn"><a href="pagecount<?php echo $pageCount < $totalPage ? $pageCount + 1 : $totalPage  ?>">Next</a></li>
    </ul>
    <!-- paging end -->


    <!-- else -->
<?php else : ?>
    <?php if (isset($_GET["search"])) : ?>
        <div style="color:red;">Dont Found</div>
    <?php else : ?>
        <div style="color:red;">Empty</div>
    <?php endif; ?>
<?php endif; ?>
<!-- Listing Elements end -->





<!-- Css codes -->
<style>
    a {
        text-decoration: none;
    }

    .pages {
        display: flex;
        list-style: none;
    }

    .btn {
        background-color: green;
        width: 75px;
        height: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
    }

    .btn a {
        color: white !important;

    }

    .link-elem a {
        margin-left: .5rem;
        height: 20px;
        width: 20px;
        background-color: #fff;
        color: green;

        display: flex;
        justify-content: center;
        align-items: center;
    }


    .link-elem:not(:last-child) {
        margin-right: 1rem;
    }

    .link-elem a.active {
        background-color: green;
        color: #fff;
    }
</style>