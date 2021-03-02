<?php
require 'db.php';

$results = [];
if (isset($_POST['type']) && $_POST['type'] == 'contact') {
    $username = $_POST['username'] ?? false;
    $email = $_POST['email'] ?? false;
    $message = $_POST['message'] ?? false;

    if (!$username) {
        $results["err"] = "Please enter a username";
    } elseif (!$email) {
        $results["err"] = "Please enter a email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $results["err"] = "Invalid email";
    } elseif (!$message) {
        $results["err"] = "Please enter a message";
    } else {
        $query = $db->prepare('INSERT INTO contact SET username = ?, email = ?,  message  = ?');
        $elems = $query->execute([$username, $email, $message]);
        if ($elems) {
            $results['success'] = 'Successfuly added';
        } else {
            $results['err'] = 'Error';
        }
    }
}

echo json_encode($results);
