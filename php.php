<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : 'Anonymous';
    $email = isset($_POST['email']) ? trim($_POST['email']) : 'No email';
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($message)) {
        die('Error: Message is required');
    }

    // Format the feedback entry
    $entry = date('Y-m-d H:i:s') . "\n";
    $entry .= "Name: " . htmlspecialchars($name) . "\n";
    $entry .= "Email: " . htmlspecialchars($email) . "\n";
    $entry .= "Message: " . htmlspecialchars($message) . "\n";
    $entry .= str_repeat('-', 30) . "\n\n";

    // Save to file
    file_put_contents('feedback.txt', $entry, FILE_APPEND);

    // Redirect back to the form
    header('Location: index.html?success=1');
    exit;
} else {
    header('Location: index.html');
    exit;
}
?>