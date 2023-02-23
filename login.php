<?php
// Initialize the session
session_start();
// if (isset($_POST) & !empty($_POST)) {

//   if (isset($_POST['csrf_token'])) {
//     if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {

//     } else {
//       $csrf_errors[] = "Problem with CSRF TOKEN";
//     }
//   }
//   $max_time = 60 * 60 * 24;
//   if (isset($_SESSION['csrf_token_time'])) {
//     $token_time = $_SESSION['csrf_token_time'];
//     if (($token_time + $max_time) >= time()) {

//     } else {
//       unset($_SESSION['csrf_token']);
//       unset($_SESSION['csrf_token_time']);
//       $csrf_errors[] = "CSRF TOKEN EXPIRED";
//     }
//   }

//   if (empty($csrf_errors)) {
//     echo "proceed";

//   }
// }
// // csrf token
// $token = md5(uniqid(rand(), true));
// $_SESSION['csrf_token'] = $token;
// $_SESSION['csrf_token_time'] = time();

 

 
// Include config file
require_once "config.php";

 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter username.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM tblaccounts WHERE email = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;  
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: ui_admin_dashboard.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($mysqli);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">
        <form action="" class="form-control" id="frmLogin" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">




            <div class="form-group">
                <label>email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="ui_register.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>