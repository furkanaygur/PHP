<?php
if ($data = form_control()) {
    $send = sendEmail($data['email'], $data['name'], $data['subject'], nl2br($data['message']));
    if ($send) {
        $json['success'] = "Mail sent";
    } else {
        $json['error'] = "Mail couldn't sent";
    }
} else {
    $json['error'] = 'Please fill all inputs';
}
