<?php
include_once("config.php");

$message = $_POST['Message'];
$postdate = date("Y-m-d");


$result = mysqli_query($mysqli, "INSERT INTO tblcomments(Message, PostDate)
VALUES('$message','$postdate')");

echo "<script>alert('Comment Added Successfully.');</script>";
echo "<script>window.location.href = 'index.php';</script>";

?>