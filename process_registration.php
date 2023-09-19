<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    /* CSS styles for confirmation message */
    .confirmation-message {
        background-color: #f0f8ff;
        /* Light blue background */
        border: 1px solid #87ceeb;
        /* Light blue border */
        color: #333;
        /* Text color */
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        max-width: 400px;
        margin: 0 auto;
        margin-top: 20px;
        font-size: 18px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .confirmation-message.success {
        background-color: #4CAF50;
        /* Green background for success */
        border-color: #45a049;
        /* Darker green border for success */
        color: white;
        /* White text color for success */
    }

    .confirmation-message.error {
        background-color: #f5eecb;
        /* Red background for error */
        box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;

        /* Darker red border for error */
        color: #FF3C3C;
        /* White text color for error */
        font-weight: 600;
        max-width: 1000px !important;
    }

    /* Center the confirmation message vertically */
    .page-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Adjust the margin for mobile devices */
    @media (max-width: 768px) {
        .confirmation-message {
            margin: 0 10px;
            max-width: none;
        }
    }

    /* CSS style for the login button/link */
    .login-button {
        display: inline-block;
        padding: 10px 50px;
        background-color: #007BFF;
        /* Blue background color */
        color: #fff;
        /* White text color */
        text-decoration: none;
        /* Remove underline for links */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-align: center;
        justify-content: center;
        margin-left: 45.5%;
        margin-top: 50px;
        /* Smooth transition on hover */

    }

    .login-button:hover {
        background-color: #0056b3;
        /* Darker blue on hover */
    }
    </style>

</head>

<body>
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
    $company = $_POST["company"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $area_code = $_POST["area_code"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $address = $_POST["address"];
    $exist = $_POST["exist"];

    // Check if the email already exists in the database
    $check_email_sql = "SELECT email FROM tbl_users WHERE email = ?";
    $check_email_stmt = $conn->prepare($check_email_sql);
    $check_email_stmt->bind_param("s", $email);
    $check_email_stmt->execute();
    $check_email_result = $check_email_stmt->get_result();

    if ($check_email_result->num_rows > 0) {
        // Email already exists, show an error message
        echo '<div class="confirmation-message error">Email already exists!</div>';
    } else {
        // Email does not exist, proceed with registration
        // Prepare an SQL statement to insert data into the database
        $insert_sql = "INSERT INTO tbl_users (first_name, last_name, company, email, password, area_code, phone, subject, address, exist)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind the statement
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("ssssssssss", $first_name, $last_name, $company, $email, $password, $area_code, $phone, $subject, $address, $exist);

        // Execute the statement
        if ($stmt->execute()) {
            // Insertion successful, show the success messages
            echo '<div class="confirmation-message success">Registration successful!</div>';
            echo '<div class="confirmation-message error">Now waiting for admin confirmation.</div>';
            // Add a login button/link
            echo '<a href="login.php" class="login-button">Login</a>';
        } else {
            // Insertion failed, show an error message
            echo '<div class="confirmation-message error">Registration failed!</div>';
        }

        // Close the statement
        $stmt->close();
    }

    // Close the check_email statement
    $check_email_stmt->close();

    // Close the database connection
    $conn->close();
}
?>

</body>

</html>