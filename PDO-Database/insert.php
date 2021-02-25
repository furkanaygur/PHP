<?php
require "header.php";
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


if (isset($_POST["submit"])) {
    $title = isset($_POST["title"]) ? $_POST["title"] : null;
    $content = isset($_POST["content"]) ? $_POST["content"] : null;
    $situation = isset($_POST["situation"]) ? $_POST["situation"] : 0;

    if (!$title) {
        echo "please enter a title";
    } elseif (!$content) {
        echo "please enter a content";
    } else {
        $query = $db->prepare("INSERT INTO `example_table` SET
            title = ?,
            content = ?,
            situation = ?
         ");

        $add = $query->execute([
            $title, $content, $situation
        ]);

        if ($add) {
            header("Location:index.php");
        } else {
            print_r($query->errorInfo());
        }
    }
}

?>

<form action="" method="POST">
    <input type="text" name="title" value="<?php echo isset($_POST["title"]) ? $_POST["title"] : "" ?>" placeholder="Title"> <br> <br>
    <textarea name="content" cols="30" rows="10" placeholder="Content"><?php echo isset($_POST["content"]) ? $_POST["content"] : "" ?></textarea> <br> <br>
    <label for="situation">Situation</label>
    <select name="situation">
        <option value="0">Unappreoved</option>
        <option value="1">Appreoved</option>
    </select> <br> <br>
    <input type="hidden" value="1" name="submit">
    <button type="submit">Insert</button>
</form>