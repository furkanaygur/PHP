<?php

$ch = curl_init('http://localhost/project/index.php');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => [
        'username' => 'admin',
        'password' => 'admin',
        'submit' => 1
    ],
    CURLOPT_COOKIEJAR => __DIR__ . 'cookie.txt'
]);

$source = curl_exec($ch);
curl_close($ch);

$ch2 = curl_init('http://localhost/project/index.php');
curl_setopt_array($ch2, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIEFILE => __DIR__ . 'cookie.txt',
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => [
        'about' => 'about me'
    ]
]);

$source2 = curl_exec($ch2);
curl_close($ch2);

echo $source2;
