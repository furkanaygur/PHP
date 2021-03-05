<?php
$table = get('table');
$column = get('column');
$id = get('id');

$query = $db->prepare('DELETE FROM ' . $table . ' WHERE ' . $column . ' = :id');
$query->execute([
    'id' => $id
]);

header('Location:' . $_SERVER['HTTP_REFERER']);
