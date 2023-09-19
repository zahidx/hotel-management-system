<?php
// Check if the form is submitted
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
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $area_code = $_POST["area_code"];
    $phone = $_POST["phone"];

    // Prepare an SQL statement to check if the user exists in the database
    $check_user_sql = "SELECT * FROM tbl_users WHERE first_name = ? AND last_name = ? AND email = ? AND area_code = ? AND phone = ?";
    $check_user_stmt = $conn->prepare($check_user_sql);
    $check_user_stmt->bind_param("sssss", $first_name, $last_name, $email, $area_code, $phone);
    $check_user_stmt->execute();
    $check_user_result = $check_user_stmt->get_result();

    if ($check_user_result->num_rows > 0) {
        // User exists, allow access to reset password page
        // Redirect to your reset password page
        header("Location: reset_password.php");
        exit();
    } else {
        // User does not exist, show an error message
        echo "User not found. Please check your information.";
    }

    // Close the statements and the database connection
    $check_user_stmt->close();
    $conn->close();
}
?>