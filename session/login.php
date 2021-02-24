<?php
if (isset($_POST["submit"])) {
    $user_name = $_POST["username"];
    $pass = $_POST["password"];
    if (!$user_name || !$pass) {
        $err = "Pls enter your password and username";
    } elseif ($user_name != $user["username"]) {
        $err = "Usernamme is incorrect";
    } elseif ($pass != $user["password"]) {
        $err = "Password is incorrect";
    } else {
        $_SESSION["time"] = time() + 10;
        $_SESSION["username"] = $user["username"];
        $msg = "Hello " . $_SESSION["username"];
    }
}
?>

<?php if (isset($err)) : ?>
    <div style="background-color:red; color:white; text-align:center; ">
        <?php echo $err; ?>
    </div>
<?php endif; ?>

<form action="" method="POST">
    <input type="text" name="username" placeholder="Username">
    <hr>
    <input type="password" name="password" placeholder="Password">
    <input type="hidden" name="submit" value="1">
    <button type="submit">Submit</button>

</form>