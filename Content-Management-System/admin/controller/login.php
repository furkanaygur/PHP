<?php
if (post('submit')) {
    if ($data = form_control()) {
        $row = $db->from('users')
            ->where('user_url', permalink($data['user_name']))
            ->where('user_rank', 3, '!=')
            ->first();
        if (!$row) {
            $error = 'Incorrect Values!';
        } else {
            $password_verify = password_verify($data['password'], $row['user_password']);
            if ($password_verify) {
                if ($row['user_rank'] == 3) {
                    $error = 'You are not authorized!!!';
                } else {
                    User::Login($row);
                    header('Location:' . adminURL());
                }
            } else {
                $error = 'Incorrect Password Please try again';
            }
        }
    } else {
        $error = 'Please fill all inputs';
    }
}
require adminView('login');
