<?php
if (isset($_POST["about"])) {
    print_r($_POST);
}
?>
you are inside :)
<form action="" method="POST">
    <input type="text" name="about" placeholder="About">
    <button type="submit" name="submit" value="1">Submit</button>
</form>