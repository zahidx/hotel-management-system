<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <!-- Add your CSS and other head content here -->
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        padding: 20px;
        background-color: #007BFF;
        color: #fff;
    }

    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ccc;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #007BFF;
        color: #fff;
    }

    a {
        text-decoration: none;
        color: #007BFF;
    }

    a:hover {
        text-decoration: underline;
    }

    a.approve {
        color: green;
    }

    a.cancel {
        color: red;
    }

    a.logout {
        display: block;
        width: 100px;
        margin: 20px auto;
        text-align: center;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    a.logout:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <h1>Welcome to the Admin Panel</h1>

    <?php
    // Connect to the database and fetch user data
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch user data
    $sql = "SELECT * FROM tbl_users WHERE status = 'pending'";
    $result = $conn->query($sql);

    if ($result === false) {
        // Query execution error
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Company Name</th><th>Email</th><th>Action</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["company"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";

                // Check if the 'id' key exists in the $row array before accessing it
                if (array_key_exists("user_id", $row)) {
                    echo "<td><a href='approve_user.php?id=" . $row["user_id"] . "'>Approve</a> | <a href='cancel_user.php?id=" . $row["user_id"] . "'>Cancel</a></td>";
                } else {
                    // Handle the case where 'id' key doesn't exist
                    echo "<td>N/A</td>";
                }

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No pending users.";
        }
    }

    $conn->close();
    ?>
    <!-- Add a logout button or link -->
    <a href="logout.php">Logout</a>
</body>

</html>