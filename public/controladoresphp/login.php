<?php 
session_start(); 
include '../../config/conexionBD.php'; 
$usuario = isset($_POST["usu_Correo"]) ? trim($_POST["usu_Correo"]) : null; 
$contrasena = isset($_POST["usu_Contrasena"]) ? trim($_POST["usu_Contrasena"]) : null; 
$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) { 
$_SESSION['isLogged'] = TRUE; 
header("Location: ../../admin/vistahtml/usuario/index.php"); 
} else { 
header("Location: ../vistahtml/login.html"); 
} 
$conn->close();
?>
