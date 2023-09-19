<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
    /* CSS for success message */
    .success-message {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        margin: 20px auto;
        max-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* CSS for error message */
    .error-message {
        background-color: #FF5733;
        color: white;
        text-align: center;
        padding: 10px;
        border-radius: 5px;
        margin: 20px auto;
        max-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    </style>
</head>

<body>
    <?php
    $success_message = ''; // Initialize the success message variable
    $error_message = ''; // Initialize the error message variable

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hotel_management";

        // Create a connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get data from the form
        $new_password = $_POST["new_password"];
        $confirm_password = $_POST["confirm_password"];
        $email = $_POST["email"];

        // Check if passwords match
        if ($new_password === $confirm_password) {
            // Passwords match, proceed with password reset
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $update_password_sql = "UPDATE tbl_users SET password = ? WHERE email = ?";
            $update_password_stmt = $conn->prepare($update_password_sql);
            $update_password_stmt->bind_param("ss", $hashed_password, $email);

            if ($update_password_stmt->execute()) {
                // Password reset successful, set the success message
                $success_message = "Password updated successfully!";
            } else {
                // Password reset failed, set the error message
                $error_message = "Password reset failed.";
            }

            $update_password_stmt->close();
        } else {
            // Passwords do not match, set the error message
            $error_message = "Passwords do not match. Please try again.";
        }

        $conn->close();
    }
    if (!empty($success_message)) {
        echo "<div class='success-message'>$success_message</div>";
    }
    if (!empty($error_message)) {
        echo "<div class='error-message'>$error_message</div>";
    }
    ?>
</body>

</html>