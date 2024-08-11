<?php

$server_name = "localhost";
$username = "root";
$password = "";
$database = "mycrud";

$connection = mysqli_connect($server_name, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



if(isset($_GET['ID'])){

$ID=$_GET['ID'];

$sql="DELETE FROM newcrud WHERE ID='$ID'";
$query=mysqli_query($connection,$sql);

if(!$query){
    die("Invalid query");
}

header("location: Index.php");
exit;


}













