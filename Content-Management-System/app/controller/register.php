<?php
$meta = [
    'title' => 'REGISTER',
];

if (post('submit')) {
    $username = post('username');
    $email = post('email');
    $password = post('password');
    $passwordRepeat = post('password_repeat');

    if (!$username) {
        $error = 'Please enter a username';
    } elseif (!$email) {
        $error = 'Please enter an email';
    } elseif (!$password || !$passwordRepeat) {
        $error = 'Please enter a password';
    } elseif ($password != $passwordRepeat) {
        $error = 'Passwords are not same';
    } else {
        $row = User::usersExist($username, $email);
        if ($row) {
            $error = 'This username or email using already';
        } else {
            $result = User::register([
                'username' => $username,
                'useremail' => $email,
                'userpassword' => password_hash($password, PASSWORD_DEFAULT),
            ]);

            if ($result) {
                User::Login([
                    'user_ID' => $db->lastInsertId(),
                    'user_name' => $username
                ]);
                $success = 'Saved Successfully';
                header('Refresh:2;url=' . siteURL());
            } else {
                $error = 'There was an error while register, please try again. ';
            }
        }
    }
}

require view('register');
