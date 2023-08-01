<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $options = $_POST['options'] ?? [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validation
    if (empty($name) || empty($email)) {
        alert('Please fill in all required fields.');
        exit;
    }

    // Prepare email message
    $to = 'joelfabok@gmail.com'; 
    $subject = 'Work Request';
    $headers = "From: noreply@joelfabok.com\n";
    $message = 'Options: ' . implode(', ', $options) . "\n";
    $message .= 'Name: ' . $name . "\n";
    $message .= 'Email: ' . $email . "\n";

    // Send email
    if (mail($to, $subject, $message)) {
        // Notify the user about successful submission
        session_start();
        $_SESSION['form_success'] = true;

        // Redirect back to index.html
        header("Location: ../index.html");
        exit;
    } else {
        echo 'Oops! Something went wrong. Please try again later.';
    }
    return true; 
}
?>

