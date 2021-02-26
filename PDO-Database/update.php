<?php

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "ID value not found";
    header("Refresh:3; url=index.php");
    exit;
}

$query = $db->prepare("SELECT * FROM `example_table` WHERE ID = ?");
$query->execute([
    $_GET["id"]
]);

$elem = $query->fetch(PDO::FETCH_ASSOC);
if (!$elem) {
    echo "elem dont exist";
    header("Refresh:3; url=index.php");
}

$for_join_categories = explode(',', $elem["for_join_ID"]);

$for_join = $db->query("SELECT * FROM `table_for_join` ORDER BY `name` ASC")->fetchAll(PDO::FETCH_ASSOC);;


if (isset($_POST["submit"])) {
    $title = isset($_POST["title"]) ? $_POST["title"] : $elem["Tilte"];
    $content = isset($_POST["content"]) ? $_POST["content"] : $elem["Content"];
    $situation = isset($_POST["situation"]) ? $_POST["situation"] : 0;
    $for_join_post_id = isset($_POST["for_join"]) && is_array($_POST["for_join"]) ? implode(",", $_POST["for_join"]) : 0;

    if (!$title) {
        echo "please enter a title";
    } elseif (!$content) {
        echo "please enter a content";
    } elseif (!$for_join_post_id) {
        echo "please choose a category";
    } else {

        $query = $db->prepare("UPDATE `example_table` SET
        Title = ?,
        Content = ?,
        for_join_ID = ?,
        Situation = ?
        WHERE ID = ?
        ");

        $update = $query->execute([
            $title, $content, $for_join_post_id, $situation, $elem["ID"]
        ]);

        if ($update) {
            echo "Successfuly updated";
            ($_POST["situation"] == 1 ? header("Refresh:3; url=index.php?page=read&id=" . $elem["ID"]) : header("Refresh:3; url=index.php"));
        } else {
            echo "Update failed";
            header("Refresh:3; url=index.php");
        }
    }
}


?>


<form action="" method="POST">
    <input type="text" name="title" value="<?php echo isset($_POST["Title"]) ? $_POST["Title"] : $elem["Title"] ?>" placeholder="Title"> <br> <br>
    <textarea name="content" cols="30" rows="10" placeholder="Content"><?php echo isset($_POST["Content"]) ? $_POST["Content"] : $elem["Content"] ?></textarea> <br> <br>
    <label for="situation">For Join: Category</label> <br>
    <select name="for_join[]" multiple size="5">
        <?php foreach ($for_join as $for_join_elem) : ?>
            <option <?php echo in_array($for_join_elem["ID"], $for_join_categories) ? "selected" : ""; ?> value="<?php echo $for_join_elem["ID"]; ?>"><?php echo $for_join_elem["name"]; ?></option>
        <?php endforeach; ?>
    </select> <br> <br>
    <label for="situation">Situation</label>
    <select name="situation">
        <option <?php echo $elem["Situation"] == 1 ? "selected" : ""; ?> value="0">Unappreoved</option>
        <option <?php echo $elem["Situation"] == 1 ? "selected" : ""; ?> value="1">Appreoved</option>
    </select> <br> <br>
    <input type="hidden" value="1" name="submit">
    <button type="submit">Update</button>
</form>