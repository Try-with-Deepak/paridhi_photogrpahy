<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration_Form</title>
</head>
<body>
    <h1>This is My First form</h1>
    <form action="submit.php" method="post">
    <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="roll">Roll</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">password</label>
        <input type="password" id="date" name="password" required><br><br>

        <input type="submit" value="Book Now" name="submit">
    <form>


    <?php
// ✅ Step 1: Database connection


// ✅ Connection check
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// ✅ Step 2: Form submit check
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ✅ Step 3: Insert query
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration Successful!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// ✅ Close connection
mysqli_close($conn);
?>
</body>
</html>