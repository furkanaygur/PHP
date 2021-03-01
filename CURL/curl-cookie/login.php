<?php
if (isset($_POST['submit'])) {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        echo 'Please enter username and password';
    } elseif ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['login'] = true;
        header('Location:index.php');
    } else {
        echo 'Incorrect username or password';
    }
}
?>

<form action="" method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="password">
    <button type="submit" name="submit" value="1"> Submit</button>
</form>