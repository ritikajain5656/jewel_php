<?php
// Session protection utility
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php?redirect=' . urlencode($_SERVER['REQUEST_URI']));
        exit();
    }
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserId() {
    return $_SESSION['user_id'] ?? null;
}

function getUsername() {
    return $_SESSION['username'] ?? null;
}

function getUserFullName() {
    return $_SESSION['full_name'] ?? null;
}

// Check session timeout (optional - 1 hour timeout)
function checkSessionTimeout($timeout = 3600) {
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > $timeout) {
        session_destroy();
        header('Location: login.php?message=session_expired');
        exit();
    }
}
?>
