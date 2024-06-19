<?php

//---check if user is logged in
function auth_check($user)
{
    global $db;
    $token = $user['token'];

    if (!$token) {
        return ['status' => 'error'];
    }

    $stmt = $db->prepare("SELECT * FROM usr_users WHERE token IN (?)");
    $stmt->execute([$token]);
    $result = $stmt->fetchObject();

    if (empty($result)) {
        return ['status' => 'error'];
    }
}