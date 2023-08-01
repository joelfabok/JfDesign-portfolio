<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $options = $_POST['options'] ?? [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validation
    if (empty($name) || empty($email)) {
        // Set error status in session
        $_SESSION['form_status'] = 'error';
        header("Location: https://www.joelfabok.com");
        exit;
    }

    // Prepare email message
    $to = 'joelfabok@gmail.com'; 
    $subject = 'Work Request';
    $message = 'Options: ' . implode(', ', $options) . "\n";
    $message .= 'Name: ' . $name . "\n";
    $message .= 'Email: ' . $email . "\n";

    // Send email
    if (mail($to, $subject, $message)) {
        // Set success status in session
        $_SESSION['form_status'] = 'success';
    } else {
        // Set error status in session
        $_SESSION['form_status'] = 'error';
    }

    header("Location: https://www.joelfabok.com");
    exit;
}
?>
