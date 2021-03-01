<?php

$name = $_POST["name"];
$recaptcha = $_POST["g-recaptcha-response"];

if (!$name) {
    echo 'Please enter a name';
} elseif (!$recaptcha) {
    echo 'click i am not a robot';
} else {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => 'secret=<your_secret_key>response=' . $recaptcha,
        CURLOPT_RETURNTRANSFER => true
    ]);
    $output = curl_exec($ch);
    curl_close($ch);

    $result =  json_decode($output, true);
    if ($result["success"] == false) {
        echo 'click i am not a robot';
    } else {
        echo "yes you can continue";
    }
}
