<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "baba";  // <-- पहले phpMyAdmin में ये database बनाओ

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $date  = $_POST['date'];
    $time  = $_POST['time'];

    // Use prepared statement for safety
    $stmt = $conn->prepare("INSERT INTO register (name, email, date, time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $date, $time);

    if ($stmt->execute()) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>