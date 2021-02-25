<?php

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "elem dont exist";
    header("Refresh:3; url=index.php");
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

if (isset($_POST["submit"])) {
    $title = isset($_POST["title"]) ? $_POST["title"] : $elem["Tilte"];
    $content = isset($_POST["content"]) ? $_POST["content"] : $elem["Content"];
    $situation = isset($_POST["situation"]) ? $_POST["situation"] : 0;

    if (!$title) {
        echo "please enter a title";
    } elseif (!$content) {
        echo "please enter a content";
    } else {

        $query = $db->prepare("UPDATE `example_table` SET
        Title = ?,
        Content = ?,
        Situation = ?
        WHERE ID = ?
        ");

        $update = $query->execute([
            $_POST["title"], $_POST["content"], $_POST["situation"], $elem["ID"]
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
    <label for="situation">Situation</label>
    <select name="situation">
        <option <?php echo $elem["Situation"] == 1 ? "selected" : ""; ?> value="0">Unappreoved</option>
        <option <?php echo $elem["Situation"] == 1 ? "selected" : ""; ?> value="1">Appreoved</option>
    </select> <br> <br>
    <input type="hidden" value="1" name="submit">
    <button type="submit">Update</button>
</form>