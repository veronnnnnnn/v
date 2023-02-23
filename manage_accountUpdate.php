<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>BlogSite</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dashboard.css">

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>   
</head>

<body>
  <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0" style="background-color: 	#5F9EA0;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/m.jpg" alt="Logo" width="120" height="50"/>
      </a>
      <a class="btn" style="background-color:	#F0F8FF;" href="index.php">Logout</a>
    </div>
  </header>


  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:#ADD8E6">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="ui_admin_dashboard.php">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>DATA ADMINISTRATION</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="ui_manage_account.php">
                <span data-feather="users" class="align-text-bottom"></span>
                Accounts Management
              </a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ui_manage_comment.php">
                <span data-feather="message-circle" class="align-text-bottom"></span>
                Posts Management
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">User Accounts Management</h1></div></main>
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <?php
include_once("config.php");
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

if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "SELECT * FROM tblaccounts WHERE ID=$id");
    while($res = mysqli_fetch_array($result))
    {
        $name = $res['Name'];
        $email = $res['Email'];
        $pass = $res['Password'];
        $modifiedDate = date("Y-m-d");
        $createdDate = date("Y-m-d");
    }
}
?>

<form action="update_account.php" method="POST" name="frmAccountUpdate" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $id; ?>">
    <input type="hidden" class="form-control" name="csrf_token" value="<?php //echo $token; ?>">
    <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form=control" id="Name" name="Name" value="<?php echo $name; ?>">
    </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Email Address</label>
        <input type="email" class="form=control" id="Email" name="Email" value="<?php echo $email; ?>">
    </div>
    <div class="mb-3">
        <label for="Password" class="form-label">Password</label>
        <input type="text" class="form=control" id="Password" name="Password" value="<?php echo $pass; ?>">
    </div>
    <div class="mb-3 float-end">
        <button type="submit" class="btn btn-sm btn-primary p-3">Update</button>
        
        <a type="button" class="btn btn-sm btn-secondary p-3" href="ui_manage_account.php">Cancel</a>
        
    </div>
</form>
         
        </div>

      </main>
    </div>
  </div>
    
  <script src="js/dashboard.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>
</html>