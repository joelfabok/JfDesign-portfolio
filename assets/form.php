<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $options = $_POST['options'] ?? [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Validation
    if (empty($name) || empty($email)) {
        echo 'Please fill in all required fields.';
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
        echo 'Thank you for your submission!';
    } else {
        echo 'Oops! Something went wrong. Please try again later.';
    }
}
?>
Make sure to replace 'your_email@example.com' with the actual email address where you want to receive the form submissions. Also, ensure that your server has email sending capabilities configured.

Note that the checkbox values will be submitted as an array with the name options[]. The code checks for the presence of the options array and retrieves its



