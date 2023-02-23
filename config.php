<?php /** * using mysqli_connectfor database connection */ 
$databaseServer= 'localhost';
$databaseName= 'blogsite';
$databaseUsername= 'root';
$databasePassword= '';

$mysqli= mysqli_connect($databaseServer, $databaseUsername, $databasePassword, $databaseName);
?>