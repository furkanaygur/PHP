<?php
$meta = [
    'title' => 'LOGIN',
];


if (post('submit')) {
    $username = post('username');
    $password = post('password');


    if (!$username) {
        $error = 'Please enter a username';
    } elseif (!$password) {
        $error = 'Please enter passwords';
    } else {
        $row = User::usersExist($username);
        if ($row) {
            $password_verify = password_verify($password, $row['user_password']);
            if ($password_verify) {
                $success = 'Logged in Redirecting';
                User::Login($row);
                header('Refresh:2;url=' . siteURL());
            } else {
                $error = 'Incorrect password Please try again';
            }
        } else {
            $error = 'This user dont exist';
        }
    }
}


require view('login');
