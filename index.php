<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>BlogSite</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
</head>

<body>

	<header>
	  <div class="collapse bg-dark" id="navbarHeader">
	    <div class="container">
	      <div class="row">
	        <div class="col-sm-8 col-md-7 py-4">
	          <h4 class="text-white">BSIT</h4>
	          <p class="text-muted">The Bachelor of Science in Information Technology (BSIT) program is a four-year degree program which focuses on the study of computer utilization and computer software to plan, install, customize, operate, manage, administer and maintain information technology infrastructure.</p>
	        </div>
	        <div class="col-sm-4 offset-md-1 py-4">
	          <h4 class="text-white">Sites</h4>
	          <ul class="list-unstyled">
	            <li><a href="https://national-u.edu.ph/" class="text-white">Visit Official Website</a></li>
                <li><a href="https://www.facebook.com/NationalUniversityPhilippines" class="text-white">Follow on Facebook - National U</a></li>
	            <li><a href="https://www.facebook.com/groups/ccitofficial/" class="text-white">Follow on Facebook - NUCCIT</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
	  </div>
	  <nav class="navbar navbar-light" style="background-color: #556B2F;">
	    <div class="container">
	      <a href="#" class="navbar-brand d-flex align-items-center" style="color: white;">
	        <strong>Information Security BlogSite</strong>
	      </a>
	      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	    </div>
	  </div>
	</header>


	<main>
	  <section class="py-5 text-center container">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
			<div class="carousel-caption d-none d-md-block">
                    <h5>National University - Manila</h5>
                    <p>Bachelor of Science in Information Security with specialization in Multimedia Arts and Animation</p>
                </div>
            <img src="images/3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
			<div class="carousel-caption d-none d-md-block">
                    <h5>National University - Manila</h5>
                    <p>Bachelor of Science in Information Security with specialization in Multimedia Arts and Animation</p>
                </div>
            <img src="images/1.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
	  </section>

	  <section class="py-2 bg-light">
	  	<div class="container">
	  		<div class="row">

	  			<div class="col-md-8">
	  				<div class="card shadow-sm">
		          	<img src="images/4.png" class="card-img-top" width = "200" height = "320" alt="...">
                        <div class="card-body">
                        <h1 class="display-5">What is Multimedia?</h1>
                        <figure>
                            <blockquote class="blockquote">
                                <p style="text-align: justify; text-justify: inter-word;">
								Multimedia is a form of communication that uses a combination of different content forms such as text, audio, images, animations, or video into a single interactive presentation, in contrast to traditional mass media, such as printed material or audio recordings, which features little to no interaction between users.
								Some of the sectors where multimedias is used extensively are education, training, reference material, business presentations, advertising and documentaries.
								a technique (such as the combining of sound, video, and text) for expressing ideas (as in communication, entertainment, or art) in which several media are employed
also : something (such as software) using or facilitating such a technique </p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                Someone famous in <cite title="Source Title">TechTarget</cite>
                                <small class="text-muted"><a href="https://www.techtarget.com/searchsecurity/definition/information-security-infosec">Source</a></small>
                            </figcaption>
                        </figure>
		                </div>
		          </div>
	  			</div>

	  			<div class="col-md-4">
	  				<div class="row">
					  <?php


 
// Include config file
require_once "config.php";
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
 
// Define variables and initialize with empty values
$name = $email = $password = "";
$name = $email_err = $password_err = $login_err = "";

 
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
                            
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
							$_SESSION["name"] = $name;
                            $_SESSION["email"] = $email;  

                            
                            // Redirect user to welcome page
							echo "<script> location.href='ui_admin_dashboard.php'; </script>";
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

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        
        <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">
		<form action="" class="form-control" id="frmLogin" enctype="multipart/form-data" autocomplete="off">
            
        <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">

<input type="hidden" class="form-control" id="name" name="name" value="frmLogin">



            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($email); ?>">
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
								
<div class="row" style="margin-top: 5px;">
							<form action="add_comment.php" method="POST" class="form-control" id="Message"

								name="Message" enctype="multipart/form-data" autocomplete="off"
								style="background-color: #3CB371;">
                                
        <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">
								

								<h1 class="h3 mb-3 fw-normal" style="color: white" >Post Comments
								</h1>

								<div class="mb-3">
									<textarea id="Message" name="Message" style="width:100%; height: 228px;"></textarea>
								</div>

								<button class="btn btn-lg btn-success float-end"
									 type="submit">Submit Post</button>

							</form>
						</div>


</div>



</div>

</div>

</section>
<section class="py-5 ">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<h1 class="h3 mb-3 fw-normal" >Comments</h1>
          
					<table class="table table-striped table-responsive" id = tblcomments>
                        
        <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">
            <thead>
              <tr>
                <th scope="col">Message</th>
                <th scope="col">PostDate</th>
              </tr>
            </thead>
<tbody>
<?php
              include_once("config.php");
              $result = mysqli_query($mysqli, "SELECT * FROM tblcomments ORDER BY id DESC");
              while($res = mysqli_fetch_array($result)){
                echo "<tr>";
                
				echo "<td class='col-6' font-family: 'Poppins', sans-serif;>" . $res['Message'] . "</td>";
				echo "<td class='col-1' font-family: 'Poppins', sans-serif;>" . $res['PostDate'] . "</td>";
                echo "</tr>";
              }
			
              ?>
</tbody>
		  </table></div></div></div></section>
	</main>

	<script src="js/bootstrap.min.js"></script>
</body>

</html>