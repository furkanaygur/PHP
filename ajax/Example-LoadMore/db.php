<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=loadmore', 'root', '');
} catch (PDOException $err) {
    $err->getMessage();
}
