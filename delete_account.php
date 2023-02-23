<?php
include_once("config.php");

if(isset($_POST['delete_user_id'])){

    $delete_user_id = $_POST['delete_user_id'];

    $query = "DELETE FROM tblaccounts WHERE ID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $delete_user_id);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    //message modal
echo "<script>alert('Data Deleted Successfully.');</script>";
echo "<script>window.location.href = 'ui_manage_account.php';</script>";
}else{

 echo "<script>
        alert('Error occurred! Please try again later');
        window.location.href= 'ui_manage_account.php';
        </script>";
}
?>