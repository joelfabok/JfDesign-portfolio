<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $options = $_POST['options'] ?? [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validation
    if (empty($name) || empty($email)) {
        // Redirect back to index.html with an error message
        header("Location: ../index.html?error=1");
        exit;
    }

    // Prepare email message
    $to = 'joelfabok@gmail.com'; 
    $subject = 'Work Request';
    $headers = "From: joelfabok.com Form" . "\r\n";
    $message = 'Options: ' . implode(', ', $options) . "\n";
    $message .= 'Name: ' . $name . "\n";
    $message .= 'Email: ' . $email . "\n";

    // Send email
    if (mail($to, $subject, $message)) {
        // Notify the user about successful submission
        session_start();
        $_SESSION['form_success'] = true;

        // Redirect back to index.html with success message
        header("Location: ../index.html");
        exit;
    } else {
        // Redirect back to index.html with an error message
        header("Location: ../index.html?error=2");
        exit;
    }
}
?>