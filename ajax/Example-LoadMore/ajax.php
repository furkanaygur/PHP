<?php
require 'db.php';

$id = $_POST['id'];

$query = $db->prepare('SELECT * FROM `data` WHERE ID < ? ORDER BY id DESC LIMIT 0, 7');

$query->execute([
    $id
]);

$elems = $query->fetchAll(PDO::FETCH_ASSOC);

$html = '';
foreach ($elems as $data) {
    ob_start();
    require 'items.php';
    $html .= ob_get_clean();
}

echo json_encode([
    'html' => $html,
    'hide' => count($elems) < 5 ? true : false
]);
