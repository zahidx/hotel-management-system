<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_management";

// Get user input from the login form
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $userEmail = $_POST["email"];
    $userPassword = $_POST["password"];

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare a SQL query to fetch user data based on the provided email
    $sql = "SELECT * FROM tbl_users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userEmail);

    if ($stmt->execute()) {
        // Execute the query
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // User with the provided email exists in the database
            $row = $result->fetch_assoc();

            // Verify the password
            if (password_verify($userPassword, $row["password"])) {
                // Password matches, check user status
                if ($row["status"] === "approved") {
                    header("Location: welcome.php");
                    exit();
                } else {
                    echo "Account not approved. Please contact the administrator.";
                }
            } else {
                echo "Incorrect email or password.";
            }
        } else {
            echo "Incorrect email or password.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle the case where email and password were not provided
    echo "Please enter both email and password.";
}
?>