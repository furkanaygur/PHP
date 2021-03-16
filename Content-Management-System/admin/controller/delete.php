<?php
$table = get('table');
$column = get('column');
$id = get('id');

if ($table == 'menu') {
    if (permission('menu-settings', 'delete')) {
        permissionPage();
    }
}
if (permission(($table == 'reference_images' ? 'reference' : $table), 'delete')) {
    permissionPage();
}

if ($table == 'reference_images') {
    if (permission('reference', 'delete')) {
        permissionPage();
    }

    $img = $db->from('reference_images')
        ->join('reference', '%s.reference_ID = %s.image_reference_ID')
        ->where('image_ID', $id)->first();

    unlink(PATH . '/upload/reference/' . $img['reference_url'] . '/' . $img['image_url']);
}
if ($table == 'reference') {
    if (permission('reference', 'delete')) {
        permissionPage();
    }

    $img = $db->from('reference')->where('reference_ID', $id)->first();

    foreach (glob(PATH . '/upload/reference/' . $img['reference_url'] . '/*') as $file) {
        unlink($file);
    }
    rmdir(PATH . '/upload/reference/' . $img['reference_url']);

    $db->delete('reference_images')->where('images_reference_ID', $id)->done();
}
if ($table == 'reference_images') {
    if (permission('reference', 'delete')) {
        permissionPage();
    }

    $img = $db->from('reference_images')
        ->join('reference', '%s.reference_ID = %s.image_reference_ID')
        ->where('image_ID', $id)->first();

    unlink(PATH . '/upload/reference/' . $img['reference_url'] . '/' . $img['image_url']);
}


$query = $db->delete($table)->where($column, $id)->done();

// $query = $db->prepare('DELETE FROM ' . $table . ' WHERE ' . $column . ' = :id');
// $query->execute([
//     'id' => $id
// ]);

if ($table == 'posts' && $query) {
    $db->delete('post_tags')->where('post_tag_ID', $id)->done();
}

if ($table == 'tags' && $query) {
    $db->delete('post_tags')->where('tag_ID', $id)->done();
}

header('Location:' . $_SERVER['HTTP_REFERER']);
