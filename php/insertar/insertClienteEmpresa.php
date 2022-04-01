<link rel="stylesheet" href="CSS/main.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">

<?php
include 'conexion.php';

echo '<center>';
echo '<center style="width:50%">';

echo "<br>";
echo "<br>";

$correoEnvia = $_POST['inputEmail'];
$nombreEnvia = $_POST['inputName'];
// $apellidoPaternoEnvia = $_POST['inputApellidoPaterno'];
// $apellidoMaternoEnvia = $_POST['inputApellidoMaterno'];
$rutEnvia = $_POST['inputRutEmpresa'];
$telefonoEnvia = $_POST['inputTelefono'];

// $contraseña = $_POST['inputContraseña'];

$razonSocial = $_POST['inputRazonSocial'];

$calle = $_POST['inputCalle'];
$comuna = $_POST['inputComuna'];
$region = $_POST['inputRegion'];
$numero = $_POST['inputNumero'];

function getUserByRut($rutParaProcesar, $conexionVariable)
{
    //$conn = pg_connect("host=localhost dbname=KenderExpress user= postgres password=admin2021");
    $conn = $conexionVariable;

    $query = "
        SELECT * FROM cliente WHERE rut = '" . $rutParaProcesar . "'
        ";
    $consulta = pg_query($conn,  $query);

    $obj = null;

    if ($conn) {
        if (pg_numrows($consulta) == 1) {
            $obj = pg_fetch_object($consulta);
        }
    }

    return $obj;
}



if (getUserByRut($rutEnvia, $conexion)) {
    echo "<p> ESTE USUARIO SE ENCUENTRA REGISTRADO EN LA BASE DE DATOS </p>";
} else {
    $sql = "
    INSERT INTO public.cliente(
	nombre, correo, telefono, rut)
	VALUES ('" . $nombreEnvia . "', '" . $correoEnvia . "', '" . $telefonoEnvia . "', '" . $rutEnvia . "');
            ";

    
}

if ($rutEnvia != null) {
    $insercion = pg_query($conexion, $sql);
} else {
    echo "INGRESE CORRECTAMENTE TODOS LOS DATOS DE USUARIO";
}

$sql = "
    INSERT INTO public.cliente_empresa(
	rut_empresa, rut, razon_social, telefono, numero, region, comuna, calle)
	VALUES ('" . $rutEnvia . "', '" . $rutEnvia . "', '" . $razonSocial . "', '" . $telefonoEnvia . "', '" . $numero . "', '" . $region . "', '" . $comuna . "', '" . $calle . "');
            ";

if ($rutEnvia != null) {
    $insercion = pg_query($conexion, $sql);
} else {
    echo "INGRESE CORRECTAMENTE TODOS LOS DATOS DE USUARIO";
}



if ($insercion) {
    echo '<div class="alert alert-success">';
    echo "Guardado con exito, vuelva atras para continuar.";
} else {
    echo '<div class="bad">';
    echo "Se ha producido un error al guardar";
}


echo "<br>";
echo "<br>";

echo "<a href='../index.html'> CLICK PARA REGRESAR </a>";

echo "</div>";

if ($insercion) {
    echo
    '
            <img style="width: 300px; -webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;" src="https://c.tenor.com/Hw7f-4l0zgEAAAAC/check-green.gif">
            ';
} else {
    echo
    '
            <img style="width: 300px; -webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;" src="https://c.tenor.com/hwe3vkln0_UAAAAC/error-x-error.gif">
            ';
}

echo "</center>";
echo '</center>';

?>