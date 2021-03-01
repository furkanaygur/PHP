<?php require 'db.php';

$id = 1;
$query = $db->prepare('SELECT * FROM test WHERE id = ?');
$query->execute([$id]);
$elem = $query->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF</title>
</head>

<body>
    <form action="form.php" method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="hidden" name="token" value="<?php echo $_SESSION["token"] ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>