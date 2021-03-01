<?php

if (!isset($_SERVER["HTTP_REFERER"])) { // !isset($_SERVER["HTTP_USER_AGENT"])
    die("You are not human. You have to be human :)");
}

if (isset($_POST["submit"])) {
    print_r($_POST);
}

?>

<form action="" method="POST">
    <input type="text" name="name" placeholder="name"> <br> <br>
    <input type="text" name="surname" placeholder="surname"> <br> <br>
    <label for="job">Job: </label>
    <select name="job" id="job">
        <option value="developer">Developer</option>
        <option value="programer">Programer</option>
    </select>
    <button type="submit" name="submit" value="1">Submit</button>
</form>