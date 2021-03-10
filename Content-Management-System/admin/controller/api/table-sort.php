<?php

$tableName = post('table');
$columnName = post('column');
$whereColumnName = post('where');
foreach (post('id') as $index => $id) {
    $db->update('categories')->where($whereColumnName, $id)->set([
        $columnName => $index
    ]);
}

$json['success'] = 'It was done successfully';
