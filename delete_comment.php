<?php
include_once("config.php");

if(isset($_POST['delete_comment_id'])){

    $delete_comment_id = $_POST['delete_comment_id'];

    $query = "DELETE FROM tblcomments WHERE ID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $delete_comment_id);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    //message modal
echo "<script>alert('Comment Deleted Successfully.');</script>";
echo "<script>window.location.href = 'ui_manage_comment.php';</script>";
}else{

 echo "<script>
        alert('Error occurred! Please try again later');
        window.location.href= 'ui_manage_commentt.php';
        </script>";
}
?>