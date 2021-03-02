<?php
require 'db.php';

if (isset($_POST['plateNo'])) {
    $plateNo = $_POST['plateNo'];

    $query = $db->prepare('SELECT * FROM `district` WHERE `provincePlateNo` = ?');
    $query->execute([$plateNo]);
    $district = $query->fetchAll(PDO::FETCH_ASSOC);
    $html = '<option value=""> - Chose a District - </option>';
    foreach ($district as $value) {
        $html .= '<option value="' . $value['districtID'] . '">' . $value['districtName'] . '</option>';
    }

    echo $html;
}
