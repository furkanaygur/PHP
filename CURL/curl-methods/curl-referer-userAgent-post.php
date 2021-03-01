<?php
// curl refere - user agent - post
$ch = curl_init('http://localhost/project/test-site.php');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_REFERER => 'https://wikipedia.org',
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => [
        'name' => 'Furkan',
        'surname' => 'Aygur',
        'job' => 'Engineer',
        'submit' => 1
    ]
]);

$source = curl_exec($ch);
curl_close($ch);

echo $source;
