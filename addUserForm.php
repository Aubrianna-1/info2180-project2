<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        
        $servername = "localhost";
        $username = "username";
        $password_db = "password123";
        $dbname = "dolphin_crm"; 

        $conn = new mysqli($servername, $username, $password_db, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO Users (firstname, lastname, password, email, role, created_at) 
                VALUES ('$firstname', '$lastname', '$hashedPassword', '$email', '$role', NOW())";

        $response = array();

        if ($conn->query($sql) === TRUE) {
            $response["success"] = true;
            $response["message"] = "New record created successfully";
        } else {
            $response["success"] = false;
            $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

        header('Content-Type: application/json');
        echo json_encode($response);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
 
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("form").addEventListener("submit", function (event) {
            event.preventDefault(); 
            var formData = new FormData(this);

            // Use AJAX to submit the form data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "add_user.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert(response.message); 
                        document.querySelector("form").reset();
                    } else {
                        alert(response.message);
                    }
                }
            };
            xhr.send(formData);
        });
    });
    </script>
</head>
<body>

    <?php include 'header.php'; ?>
    
    <div class="main-container">
        <?php include 'sidebar.php'; ?>

        <div class="content">
            <h2>New User</h2>
            <form action="addUserForm.php" method="post" onsubmit="hidePasswordFormatMessage()">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname" required>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" name="lastname" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                            onfocus="showPasswordFormatMessage()" oninput="hidePasswordFormatMessage()">
                        <!-- Password pattern enforces at least one lowercase letter, one uppercase letter, one digit, and be at least 8 characters long -->
                        <div id="passwordFormatMessage" class="password-format-message">
                            Password must contain at least one lowercase letter, one uppercase letter, one digit, and be at least 8 characters long.
                        </div>
                    </div>
                </div>

                <div class="form-group role">
                    <label for="role">Role:</label>
                    <select name="role" required>
                        <option value="Admin">Admin</option>
                        <option value="Member">Member</option>
                    </select>
                </div>

                <input type="submit" value="Save">
            </form>
        </div>
    </div>

</body>
</html>
