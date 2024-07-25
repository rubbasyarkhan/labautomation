<?php
if (!isset($_SESSION)) {
    session_start();
}

// Check if 'user' key exists in $_SESSION and is not null
if (isset($_SESSION['user']) && !is_null($_SESSION['user'])) {
    $user = json_decode($_SESSION['user'], true);

    // Check if the necessary keys exist in the $user array
    $username = isset($user["name"]) ? htmlspecialchars($user["name"], ENT_QUOTES, 'UTF-8') : '';
    $useremail = isset($user["email"]) ? htmlspecialchars($user["email"], ENT_QUOTES, 'UTF-8') : '';
    $userid = isset($user["id"]) ? htmlspecialchars($user["id"], ENT_QUOTES, 'UTF-8') : '';
    $userrole = isset($user["role"]) ? htmlspecialchars($user["role"], ENT_QUOTES, 'UTF-8') : '';
} else {
    // Redirect to login page if 'user' key does not exist in $_SESSION or is null
    header('Location: login.php');
    exit();
}
?>
