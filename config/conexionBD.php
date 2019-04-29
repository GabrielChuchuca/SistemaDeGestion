<?php
$servername="localhost";
$username = "root";
$password="";
$dbname = "hipermedial";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

//check connection
if($conn->connect_error){
    die("Connection failed:" . $conn->connect_error );
}else{
    echo "<script>alert('Conexion Exitosa');</script>";
}
?>