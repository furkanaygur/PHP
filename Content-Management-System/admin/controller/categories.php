<?php
if (permission('categories', 'view')) {
    permissionPage();
}
$rows = $db->from('categories')->orderby('category_order', 'ASC')->all();

if (!$rows) {
    header('Location:' . adminURL('index'));
    exit;
}

require adminView('categories');
