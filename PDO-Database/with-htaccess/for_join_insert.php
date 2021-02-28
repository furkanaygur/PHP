<?php
if (isset($_POST["name"])) {

    if (empty($_POST["name"])) {
        echo "please enter a name";
    } else {
        $query = $db->prepare("INSERT INTO `table_for_join` SET `name` = ?");
        $elem = $query->execute([
            $_POST["name"]
        ]);

        if ($elem) {
            echo "Successfuly added";
            header("Refresh:1; url=for_join");
        } else {
            echo "Error";
        }
    }
}
?>

<form action="" method="POST">
    <input type="text" name="name" placeholder="Add content 2: name">
    <button type="submit">Insert</button>
</form>