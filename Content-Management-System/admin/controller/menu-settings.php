<?php
if (permission('menu-settings', 'view')) {
    permissionPage();
}
$query = $db->prepare('SELECT * FROM menu ORDER BY menu_ID DESC');
$query->execute([]);
$rows = $query->fetchAll(PDO::FETCH_ASSOC);

require adminView('menu-settings');
