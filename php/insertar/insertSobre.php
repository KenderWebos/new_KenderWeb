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
$apellidoPaternoEnvia = $_POST['inputApellidoPaterno'];
$apellidoMaternoEnvia = $_POST['inputApellidoMaterno'];
$rutEnvia = $_POST['inputRut'];
$telefonoEnvia = $_POST['inputTelefono'];


$nombreRecibe = $_POST['inputNombreDestinatario'];
$apellidoPaternoRecibe = $_POST['inputApellidoPaternoDestinatario'];
$apellidoMaternoRecibe = $_POST['inputApellidoMaternoDestinatario'];
$rutRecibe = $_POST['inputRutDestinatario']; // aca
$telefonoRecibe = $_POST['inputTelefono'];
//$direccionRecibe = $_POST['inputDireccion'];
$correoDestinatario = $_POST['inputCorreoDestinatario'];

$calle = $_POST['inputCalle'];
$comuna = $_POST['inputComuna'];
$region = $_POST['inputRegion'];
$numero = $_POST['inputNumero'];

function getUserByRut($rutParaProcesar, $conexionVariable)
{
    $conn = $conexionVariable;
    //$conn = pg_connect("host=localhost dbname=KenderExpress user= postgres password=pobletecastillo21");

    $query = "
        SELECT * FROM cliente WHERE rut = '".$rutParaProcesar."'
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
    echo "<p> ESTE USUARIO SE ENCUENTRA REGISTRADO EN LA BASE DE DATOS, SE PROCEDERA CON EL ENVIO </p>";
} else {
    $sql = "
    INSERT INTO public.cliente(
	nombre, apellido_paterno, apellido_materno, correo, telefono, rut)
	VALUES ('" . $nombreEnvia . "', '" . $apellidoPaternoEnvia . "', '" . $apellidoMaternoEnvia . "', '" . $correoEnvia . "', '" . $telefonoEnvia . "', '" . $rutEnvia . "');
            ";

    if ($rutRecibe != null and $rutEnvia != null) {
        $insercion = pg_query($conexion, $sql);
    } else {
        echo "INGRESE CORRECTAMENTE TODOS LOS DATOS DE USUARIO";
    }
}

$sql = "
    INSERT INTO public.envio(
    codigo, seguimiento, rut_destinatario, rut_remitente, calle, comuna, region, numero)
    VALUES (0, 'En sucursal', " . $rutRecibe . ", " . $rutEnvia . ", '" . $calle . "', '" . $comuna . "', '" . $region . "', '" . $numero . "');
            ";

if ($calle != null and $comuna != null and $region != null and $numero != null) {
    $insercion = pg_query($conexion, $sql);
} else {
    echo "INGRESE CORRECTAMENTE TODOS LOS DATOS DE ENVIO";
}

function getNumeroOrdenTransporte($conexionVariable)
{
    $numOrdenTransporte = 1;

    //$conn = pg_connect("host=localhost dbname=KenderExpress user= postgres password=pobletecastillo21");
    $conn = $conexionVariable;
    $query = "SELECT * FROM envio";
    $consulta = pg_query($conn,  $query);
    if ($conn) {
        if (pg_numrows($consulta) > 0) {
            while ($obj = pg_fetch_object($consulta)) {
                $numOrdenTransporte = $obj->numero_orden_transporte;
            }
        }
        return $numOrdenTransporte;
    }
    return 0;
}

$num_orden_transporte = getNumeroOrdenTransporte($conexion);

$sql = "
    INSERT INTO public.sobre(
    remitente,  numero_orden_transporte)
    VALUES ( '".$nombreEnvia."', ".$num_orden_transporte.");
            ";


if (true) {
    $insercion = pg_query($conexion, $sql);
} else {
    echo "</br> </br> INGRESE CORRECTAMENTE TODOS LOS DATOS DE ENCOMIENDA";
    $insercion = null;
}

if ($insercion) {
    echo "<p> Su numero de orden de pedido es ".$num_orden_transporte." </p>";
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