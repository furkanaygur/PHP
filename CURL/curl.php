<?php

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => 'https://furkanaygur.netlify.app',
    CURLOPT_RETURNTRANSFER => true
]);

$source = curl_exec($ch);
curl_close($ch);

preg_match('/<title>(.*?)<\/title>/', $source, $title);
echo $title[1];
