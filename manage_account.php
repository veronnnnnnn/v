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
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/infosec.png" alt="Logo" width="120" height="24"/>
      </a>
      <a class="btn btn-outline-success" href="index.php">Logout</a>
    </div>
  </header>


  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
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
          <h1 class="h2">User Accounts Management</h1>
          <table id= "tblAccounts" class="table table-striped table-responsive">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Created Date</th>
    <th scope="col">Modified Date</th>
    <th scope="col">Actions</th>
  </tr>
</thead>
<tbody>
  <?php
  include_once("config.php");
  $result = mysqli_query($mysqli, "SELECT * FROM tblaccounts ORDER BY id DESC");
  while($res = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $res['ID'] . "</td>";
    echo "<td>" . $res['Name'] . "</td>";
    echo "<td>" . $res['Email'] . "</td>";
    echo "<td>" . $res['CreatedDate'] . "</td>";
    echo "<td>" . $res['ModifiedDate'] . "</td>";
    echo "<td>
            <a type='button' class='btn btn-sm btn-info' href='manage_accountUpdate.php?id=".$res['ID']."'>Edit</a> |
            <a type='button' class='btn btn-sm btn-danger' href='delete_account.php?id=".$res['ID']."'>Delete</a>
    </td>";
    echo "</tr>";
  }
  ?>
</tbody>
</table>
         
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