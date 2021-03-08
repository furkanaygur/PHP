<?php
$table = get('table');
$column = get('column');
$id = get('id');

if ($table == 'menu') {
    if (permission('menu-settings', 'delete')) {
        permissionPage();
    }
}
if (permission($table, 'delete')) {
    permissionPage();
}


$query = $db->prepare('DELETE FROM ' . $table . ' WHERE ' . $column . ' = :id');
$query->execute([
    'id' => $id
]);

header('Location:' . $_SERVER['HTTP_REFERER']);
