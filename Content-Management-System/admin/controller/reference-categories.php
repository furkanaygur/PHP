<?php
if (permission('reference-categories', 'view')) {
    permissionPage();
}
$rows = $db->from('reference_categories')->orderby('category_order', 'ASC')->all();

require adminView('reference-categories');
