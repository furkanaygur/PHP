<?php

class User
{
    public static function Login($data)
    {
        $_SESSION['user_ID'] = $data['user_ID'];
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['user_email'] = $data['user_email'];
        if (isset($data['user_rank']) || isset($data['user_permissions'])) {
            $_SESSION['user_rank'] = $data['user_rank'];
            $_SESSION['user_permissions'] = $data['user_permissions'];
        }
    }

    public static function usersExist($username, $email = '@@')
    {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE user_name = :username OR user_email = :useremail');
        $query->execute([
            'username' => $username,
            'useremail' => $email
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function register($data)
    {
        global $db;
        $query = $db->prepare('INSERT INTO users SET user_name = :username, user_email= :useremail, user_password = :userpassword');
        return $query->execute($data);
    }
}
