<?php 
session_start(); 

include '../../config/conexionBD.php'; 

$usuario = isset($_POST["custCorreo"]) ? trim($_POST["custCorreo"]) : null; 
$contrasena = isset($_POST["custContrasena"]) ? trim($_POST["custContrasena"]) : null; 

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
