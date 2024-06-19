<?php
session_start();
$root = [
    'now' => date("Y-m-d H:i:s")
];

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$root['domain'] = $protocol . $_SERVER['HTTP_HOST'];

// --- Common Imports
require_once "connection/database_model.php";
require_once "utils/utils.php";
require_once "assets/internal/middleware/auth.php";

// -------------------------------------------------------------------------------------------------

// --- Auth
$root['page'] = explode("?", $_SERVER['REQUEST_URI'])[0];
$root['user']['session_id'] = session_id();
$root['user']['token'] = $_SESSION['token'] ?? '';
$result = auth_check($root['user']);

//get header according to login state
ob_start();
if ($result['status'] != 'success') {
    //if not logged in, then redirect.
    if ($root['page'] != '/login') {
        header("Location: " . $root['domain'] . "/login");
        exit();
    }

    include_once "templates/components/header-guest.php";
}
$header = ob_get_clean();

// -------------------------------------------------------------------------------------------------

// --- Routes
ob_start();
switch ($root['page']) {
    case '/':
        include_once "templates/pages/dashboard.php";
        break;
    case '/login':
        include_once "templates/pages/auth.php";
        break;
    default:
        include_once "templates/pages/404.php";
        break;
}

$content = ob_get_clean();

// --- Serve-da-page!
ob_start();

include_once "templates/layout.php";

ob_end_flush();
exit();















