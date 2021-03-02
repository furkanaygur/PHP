<?php require 'db.php';
$provinces = $db->query('SELECT * FROM provinces')->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</head>


<body>
    <ul>
        <li>
            <div>Province</div>
            <select name="province" id="province">
                <option value=""> - Chose a Province - </option>
                <?php foreach ($provinces as $province) : ?>
                    <option value="<?= $province['plateNo'] ?>"><?= $province['provinceName'] ?></option>
                <?php endforeach; ?>
            </select>
        </li>
        <br>
        <li>
            <div>District</div>
            <select name="district" id="district" disabled>
                <option value=""> - Chose a District - </option>

            </select>
        </li>
    </ul>
</body>

</html>