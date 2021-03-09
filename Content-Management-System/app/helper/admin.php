<?php
function adminController($controllerName)
{
    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

function  adminView($viewName)
{
    return PATH . '/admin/view/' . $viewName . '.php';
}

function adminURL($url = false)
{
    return URL . '/admin/' . $url;
}
function adminPublicURL($url = false)
{

    return URL . '/admin/public/' . $url;
}

function user_ranks($rankID = null)
{
    $ranks = [
        '1' => "Admin",
        '2' => 'Moderator',
        '3' => 'User'
    ];
    return $rankID ? $ranks[$rankID] : $ranks;
}

function permission($url, $action)
{
    $permissions = json_decode(session('user_permissions'), true);
    if (!isset($permissions[$url][$action])) {
        return true;
    }
    return false;
}

function permissionPage()
{
    require adminView('permission-denied');
}


function sendEmail($email, $name, $subject, $message)
{

    $mail = new PHPMailer(true);

    try {

        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = setting('smtp_host');
        $mail->SMTPAuth   = true;
        $mail->Username   = setting('smtp_email');
        $mail->Password   = setting('smtp_password');
        $mail->SMTPSecure = setting('smtp_secure');
        $mail->Port       = setting('smtp_port');
        $mail->CharSet = 'UTF-8';

        $mail->setFrom(setting('smtp_email'), setting('smtp_sender_name'));
        $mail->addAddress($email, $name);


        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;


        $mail->send();

        return true;
    } catch (Exception $e) {
        return false;
    }
}
