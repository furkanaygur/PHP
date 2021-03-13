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

$query = $db->delete($table)->where($column, $id)->done();

// $query = $db->prepare('DELETE FROM ' . $table . ' WHERE ' . $column . ' = :id');
// $query->execute([
//     'id' => $id
// ]);

if ($table == 'posts' && $query) {
    $db->delete('post_tags')->where('post_tag_ID', $id)->done();
}


header('Location:' . $_SERVER['HTTP_REFERER']);
