<?php
if ($data = form_control('phone')) {

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $json['error'] = "Please enter an correct email adress";
    } else {
        $query = $db->insert('contact')->set([
            'contact_name' => $data['name'],
            'contact_email' => $data['email'],
            'contact_phone' => $data['phone'],
            'contact_subject' => $data['subject'],
            'contact_content' => $data['content'],
        ]);
        if ($query) {
            $json['success'] = "Your message has been received";
        } else {
            $json['error'] = "There was a problem, your message could not be delivered";
        }
    }
} else {
    $json['error'] = "Please fill all inputs";
}
