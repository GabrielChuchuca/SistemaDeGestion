<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';

    $cedula = isset($_POST["custCedula"]) ? trim($_POST["custCedula"]) : null;
    $nombres = isset($_POST["custNombres"]) ? mb_strtoupper(trim($_POST["custNombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["custApellidos"]) ? mb_strtoupper(trim($_POST["custApellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["custDireccion"]) ? mb_strtoupper(trim($_POST["custDireccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["custTelefono"]) ? trim($_POST["custTelefono"]) : null;
    $correo = isset($_POST["custCorreo"]) ? trim($_POST["custCorreo"]) : null;
    $fechaNacimiento = isset($_POST["custFechaNacimiento"]) ? trim($_POST["custFechaNacimiento"]) : null;
    $contrasena = isset($_POST["custContrasena"]) ? trim($_POST["custContrasena"]) : null;

    $sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null)";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    $conn->close();
    echo "<a href='../vistahtml/crear_usuario.html'>Regresar</a>";
    ?>
</body>

</html>