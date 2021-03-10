<?php
if (permission('categories', 'view')) {
    permissionPage();
}
$rows = $db->from('categories')->orderby('category_order', 'ASC')->all();

require adminView('categories');
