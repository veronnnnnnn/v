<!doctype html>
<html lang="en">
<head>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
          <h1 class="h2">Post Management</h1></div></main>
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          
          <table id= "tblComments" class="table table-striped table-responsive">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Message</th>
                <th scope="col">PostDate</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once("config.php");
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
              $result = mysqli_query($mysqli, "SELECT * FROM tblcomments ORDER BY id DESC");
              while($res = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $res['ID'] . "</td>";
                echo "<td>" . $res['Message'] . "</td>";
                echo "<td>" . $res['PostDate'] . "</td>";
                echo "<td>
                <button type='button' class='btn btn-danger delete_data' data-bs-toggle='modal'
                data-bs-target='#deleteModal' id=" . $res['ID'] . ">
                Delete
            </button>

            <!-- Modal -->
            <div class='modal fade' id='deleteModal' tabindex='-1'
                aria-labelledby='deleteModalLabel' aria-hidden='true'  >
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='deleteModalLabel'>Warning</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal'
                                aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            Are you sure you want to delete this data?
                        </div>
                        <div class='modal-footer'>
                        <form action='delete_comment.php' method='post'>
                        
        <input type='hidden' class='form-control' name='csrf_token' value='<?php //echo token; ?>'>
                            <input type='hidden' name='delete_comment_id' id='delete_comment_id'>
                            <button type='button' class='btn btn-secondary'
                                data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>    
                        </div>
                    </div>
                </div>
            </div>
         </td>";
         echo "</tr>";
     }
     ?>
            </tbody>
            </table>
         
        </div>
        <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

      </main>
    </div>
  </div>
    
  <script src="js/dashboard.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
  <script src="js/datatable.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete_data', function() {
                var comment_id = $(this).attr("id");
                $('#deleteModal').modal("show");
                $('#delete_comment_id').val(comment_id);
            });
        });
    </script>
</body>
</html>