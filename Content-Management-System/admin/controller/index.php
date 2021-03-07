<?php
if (permission('index', 'view')) {
    permissionPage();
}

require adminView('index');
