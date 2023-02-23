<?php
include_once("config.php");

if (isset($_POST['Submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['confirm_password'];
    $createdDate = date("Y-m-d");
    $modifiedDate = date("Y-m-d");

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('Email is not valid!');
    } else {

        if ($stmt = $mysqli->prepare('SELECT ID, Password FROM tblaccounts WHERE Email = ?')) {
            // Bind parameters (s = string, i = int, b = blob, etc).
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
            // Store the result so we can check if the account exists in the database.
            if ($stmt->num_rows > 0) {
                // Username already exists
                echo "<script>
                    alert('User Already Exists!');
                    window.location.href= 'ui_register.php';
                    </script>";
            } else {
                if ($stmt = $mysqli->prepare('INSERT INTO tblaccounts (Name, Email, Password, CreatedDate, ModifiedDate) VALUES (?, ?, ?, ?, ?)')) {
                    $stmt->bind_param('sssss', $name, $email, $pass, $createdDate, $modifiedDate);
                    $stmt->execute();
                    echo "<script>
                        alert('You have successfully registered, you can now login!');
                        window.location.href= 'index.php';
                        </script>";
                } else {
                    echo "<script>
                        alert('Something went wrong!');
                        window.location.href= 'index.php';
                        </script>";
                }
            }

        } else {
            echo "<script>
            alert('Something went wrong!');
            window.location.href= 'index.php';
            </script>";
        }
    }
}
?>