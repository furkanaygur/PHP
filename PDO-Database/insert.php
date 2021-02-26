<?php
/*
$query = $db->prepare("INSERT INTO `example_table` SET
title = ?,
content = ?,
situation = ?
");

$add = $query->execute([
    'deneme', 'content', 1
]);

if ($add) {
    echo "added";
} else {
    print_r($query->errorInfo());
}

*/

$for_join = $db->query("SELECT * FROM `table_for_join` ORDER BY `name` ASC")->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST["submit"])) {
    $title = isset($_POST["title"]) ? $_POST["title"] : null;
    $content = isset($_POST["content"]) ? $_POST["content"] : null;
    $for_join_id_value = isset($_POST["for_join_value"]) && is_array($_POST["for_join_value"]) ? implode(",", $_POST["for_join_value"]) : null;
    $situation = isset($_POST["situation"]) ? $_POST["situation"] : 0;


    if (!$title) {
        echo "please enter a title";
    } elseif (!$content) {
        echo "please enter a content";
    } elseif (!$for_join_id_value) {
        echo "please choose a category";
    } else {
        $query = $db->prepare("INSERT INTO `example_table` SET
            title = ?,
            content = ?,
            situation = ?,
            for_join_ID = ?
         ");

        $add = $query->execute([
            $title, $content, $situation, $for_join_id_value
        ]);
        $lastID = $db->lastInsertId();
        if ($add) {
            echo "Successfuly added ";
            $situation == 1 ? header("Location:index.php?page=read&id=" . $lastID) : header("Location:index.php");
            print_r($query->errorInfo());
        }
    }
}



?>

<form action="" method="POST">
    <input type="text" name="title" value="<?php echo isset($_POST["title"]) ? $_POST["title"] : "" ?>" placeholder="Title"> <br> <br>
    <textarea name="content" cols="30" rows="10" placeholder="Content"><?php echo isset($_POST["content"]) ? $_POST["content"] : "" ?></textarea> <br> <br>
    <label for="situation">For Join: Category</label> <br>
    <select name="for_join_value[]" multiple size="5">
        <?php foreach ($for_join as $elem) : ?>
            <option value="<?php echo $elem["ID"]; ?>"><?php echo $elem["name"]; ?></option>
        <?php endforeach; ?>
    </select> <br> <br>
    <label for="situation">Situation</label>
    <select name="situation">
        <option value="0">Unappreoved</option>
        <option value="1">Appreoved</option>
    </select> <br> <br>
    <input type="hidden" value="1" name="submit">
    <button type="submit">Insert</button>
</form>