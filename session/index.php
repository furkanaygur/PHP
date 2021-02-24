<?php
session_start();
ob_start();
require "settings.php";
if (isset($_SESSION["time"]) && time() > $_SESSION["time"]) {
    session_destroy();
    header("Location:session-ended.php");
} else {
    $_SESSION["time"] = time() + 10;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>

<body>
    <?php
    if (isset($_SESSION["username"])) {
        include "admin.php";
    } else {
        include "login.php";
    }
    ?>
</body>

</html>