<?php
if (permission('settings', 'view')) {
    permissionPage();
}
$themes = [];
foreach (glob(PATH . '/app/view/*/') as $folder) {
    $folder = explode('/', rtrim($folder, '/'));
    $themes[] = end($folder);
}

if (post('submit')) {
    if (permission('settings', 'edit')) {
        permissionPage();
        exit;
    }
    $html = '<?php' . PHP_EOL . PHP_EOL;
    foreach (post('settings') as $key => $value) {
        $html .= '$settings["' . $key . '"] = "' . $value . '";' . PHP_EOL;
    }
    file_put_contents(PATH . '/app/settings.php', $html);
    header('Location:' . adminURL('settings'));
}

require adminView('settings');
