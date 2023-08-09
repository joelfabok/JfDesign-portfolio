<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $options = $_POST['options'] ?? [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $comments = $_POST['comments'] ?? '';

    // Validation
    if (empty($name) || empty($email)) {
        // Redirect back to index.html with an error message
        header("Location: https://www.spheredigital.ca?error=1");
        exit;
    }

    // Prepare email message
    $to = 'joel@spheredigital.ca'; 
    $subject = 'Work Request From Spheredigital.ca';
    $message = 'Options: ' . implode(', ', $options) . "\n";
    $message .= 'Name: ' . $name . "\n";
    $message .= 'Email: ' . $email . "\n";
    $message .= 'Comments: ' . $comments . "\n";

    // Send email
    if (mail($to, $subject, $message)) {
        // Notify the user about successful submission
        session_start();
        $_SESSION['form_success'] = true;

        // Redirect back to index.html with success message
        header("Location: https://www.spheredigital.ca?success=1");
        exit;
    } else {
        // Redirect back to index.html with an error message
        header("Location: https://www.spheredigital.ca?error=2");
        exit;
    }
}
?>