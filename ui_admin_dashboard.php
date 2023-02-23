<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


?><!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>BlogSite</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dashboard.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  
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
          <h1 class="h2">Dashboard</h1>
          
          
         
        </div>

      </main>
      <div class="row">
                            <div class="col-xl-3 col-md-6" style="margin-left:500px" >
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body" >
                                    <?php
  include_once("config.php");
  $result = mysqli_query($mysqli,"SELECT * FROM tblaccounts");
$rows = mysqli_num_rows($result);
echo $rows . " User Registrations" ;
      ?></div>
   <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background-color: 	#00008B;">
                                    <div class="card-body">
                                    <?php
  include_once("config.php");
  $result = mysqli_query($mysqli,"SELECT * FROM tblcomments");
$rows = mysqli_num_rows($result);
echo $rows . " Comments" ;
      ?></div>
     <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            
      <?php
      
      $query = $mysqli->query("SELECT  name as monthname, email as amount FROM tblaccounts GROUP BY monthname");
      foreach ($query as $data) {
      $month[] = $data['monthname'];
      $amount[] = $data['amount'];
      }
     
$dataPoints = array(
	array("y" => 25, "label" => "December"),
	array("y" => 15, "label" => "January"),
	array("y" => 25, "label" => "Febraury"),
	array("y" => 5, "label" => "March"),
	array("y" => 10, "label" => "April"),
	array("y" => 0, "label" => "May"),
	array("y" => 20, "label" => "June")
);
 
?>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Line Chart"
	},
	
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer"  style="height: 370px; width: 50%; margin-left: 500px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  
    
  <script src="js/dashboard.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>
</html>