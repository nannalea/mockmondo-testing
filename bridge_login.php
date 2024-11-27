<?php
$correct_email = 'a@a.com';
$correct_password = 'password';

// VALIDATE
if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
    // Invalid email format
    $callback_message = "Invalid email format.";
    header('Location: view_login.php?callback_email=' . urlencode($callback_email));
    exit();
}

// Check if the user's email matches the correct email
if ($_POST['user_email'] != $correct_email) {
    // Email not found in the database
    $callback_message = "Email not found in the database.";
    header('Location: view_login.php?callback_email=' . urlencode($callback_message));
    exit();
}

// Check if the user's password matches the correct password
if ($_POST['user_password'] !== $correct_password) {
    // Incorrect password
    $callback_message = "Incorrect password.";
    header('Location: view_login.php?callback_password=' . urlencode($callback_message));
    exit();
}

// Success
session_start();
$_SESSION['user_name'] = 'Anna';
header('Location: home');
