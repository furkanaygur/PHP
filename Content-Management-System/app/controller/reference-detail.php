<?php

if (!route(1)) {
    header('Location:' . siteURL('reference'));
    exit;
}

$reference_url = route(1);

$row = $db->from('reference')->where('reference_url', $reference_url)->first();

if (!$row) {
    header('Location:' . siteURL('reference'));
    exit;
}

$images = $db->from('reference_images')->where('image_reference_ID', $row['reference_ID'])
    ->orderby('image_ID', 'DESC')->all();

require view('reference-detail');
