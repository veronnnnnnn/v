<?php
// Include config file
require_once "config.php";
 


// Define variables and initialize with empty values
$name = $email = $password = $confirm_password = "";
$name_err = $email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username
  if (empty(trim($_POST["name"]))) {
    $name_err = "Please enter a name.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM tblaccounts WHERE name = ?";

    if ($stmt = mysqli_prepare($mysqli, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_name);

      // Set parameters
      $param_name = trim($_POST["name"]);

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);

        
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }
}
  

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM tblaccounts WHERE email = ?";
        
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This username is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    $password = $_POST['password'];
    $uppercase    = preg_match('@[A-Z]@', $password);
  $lowercase    = preg_match('@[a-z]@', $password);
  $number       = preg_match('@[0-9]@', $password);
  $specialchars = preg_match('@[^\w]@', $password);
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";    
    } elseif(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
        $password_err = "The password must be at least 8 characters, include at least one upper case, one number, and one special character.";
    } else{
        $password = trim($_POST["password"]);
    }
   
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";    
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }


    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO tblaccounts (email, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
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
// if (isset($_POST) & !empty($_POST)) {

  // if (isset($_POST['csrf_token'])) {
    // if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {

     //} else {
      // $csrf_errors[] = "Problem with CSRF TOKEN";
     //}
   //}
   //$max_time = 60 * 60 * 24;
   //if (isset($_SESSION['csrf_token_time'])) {
    // $token_time = $_SESSION['csrf_token_time'];
    // if (($token_time + $max_time) >= time()) {

     //} else {
       //unset($_SESSION['csrf_token']);
       //unset($_SESSION['csrf_token_time']);
       //$csrf_errors[] = "CSRF TOKEN EXPIRED";
     //}
   //}

   //if (empty($csrf_errors)) {
     //echo "proceed";

   //}
 //}
// //csrf token
 //$token = md5(uniqid(rand(), true));
 //$_SESSION['csrf_token'] = $token;
 //$_SESSION['csrf_token_time'] = time();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
body {
  background: #8FBC8F;
}

.content {
  max-width: 500px;
  margin: auto;
  background: white;
  padding: 50px;
}
</style>
</head>
<body>
    <div class="content">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">
        <div class="form-group">
       
                <label>Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div> 
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>