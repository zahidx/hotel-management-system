<?php
if (isset($_GET["id"])) {
    $user_id = $_GET["id"];

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the user status to 'approved' in the database
    $sql = "UPDATE tbl_users SET status = 'cancelled' WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // User approval successful
        echo "User with ID $user_id has been Cancelled.";
    } else {
        // User approval failed
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "User ID not provided.";
}
?>