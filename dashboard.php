<?php
// Start session
session_start();

// Simulated database of user IDs and passwords
$users = array(
    "user1" => "password1",
    "user2" => "password2",
    // Add more users as necessary
);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];

    // Check if ID exists in the database
    if (array_key_exists($id, $users)) {
        // Verify password
        if ($users[$id] == $password) {
            // Set session variables
            $_SESSION['id'] = $id;
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "ID not found.";
    }
}

// If session is set, redirect to dashboard
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    // You can fetch personal details from a database here
    // For demonstration purposes, displaying only the ID
    echo "<h2>Welcome, $id!</h2>";
    echo "<p>Personal details:</p>";
    echo "<p>ID: $id</p>";
} else {
    // If session is not set, redirect to login page
    header("Location: index.php");
    exit;
}
?>
