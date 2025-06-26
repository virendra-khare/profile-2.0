<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Database credentials
    $host = "localhost";
    $username = "root"; // your DB username
    $password = "";     // your DB password
    $database = "test"; // change this

    // Connect to MySQL database
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("<div style='padding:20px; background:#f8d7da; color:#721c24;'>Connection failed: " . mysqli_connect_error() . "</div>");
    }

    // Insert query
    $sql = "INSERT INTO message (name, email, msg) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
        if (mysqli_stmt_execute($stmt)) {
            echo "<div style='padding:20px; background:#d4edda; color:#155724;'>
                    <h2>Message submitted successfully!</h2>
                    <p><strong>Name:</strong> $name</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>Message:</strong> $message</p>
                    <a href='contact.html'>Go Back</a>
                  </div>";
        } else {
            echo "<div style='padding:20px; background:#f8d7da; color:#721c24;'>Error submitting form.</div>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<div style='padding:20px; background:#f8d7da; color:#721c24;'>Error preparing statement.</div>";
    }

    mysqli_close($conn);
} else {
    // Redirect if accessed directly
    header("Location: contact.html");
    exit;
}
?>
