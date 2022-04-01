<link rel="stylesheet" href="CSS/main.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">

<?php
include 'conexion.php';

echo '<center>';
echo '<center style="width:50%">';

echo "<br>";
echo "<br>";

$ordenDeTransporteActualizacion = $_POST['inputId'];

$estado = $_POST['inputEstado'];

$calle = $_POST['inputCalle'];
$comuna = $_POST['inputComuna'];
$region = $_POST['inputRegion'];
$numero = $_POST['inputNumero'];

// function getUserByRut($rutParaProcesar, $conexionVariable)
// {
//     //$conn = pg_connect("host=localhost dbname=KenderExpress user= postgres password=admin2021");
//     $conn = $conexionVariable;

//     $query = "
//         SELECT * FROM cliente WHERE rut = '" . $rutParaProcesar . "'
//         ";
//     $consulta = pg_query($conn,  $query);

//     $obj = null;

//     if ($conn) {
//         if (pg_numrows($consulta) == 1) {
//             $obj = pg_fetch_object($consulta);
//         }
//     }

//     return $obj;
// }

// if (getUserByRut($rutEnvia, $conexion)) {
//     echo "<p> ESTE USUARIO SE ENCUENTRA REGISTRADO EN LA BASE DE DATOS, SE PROCEDERA CON EL ENVIO </p>";
// } else {
//     $sql = "
//     INSERT INTO public.cliente(
// 	nombre, apellido_paterno, apellido_materno, correo, telefono, rut)
// 	VALUES ('" . $nombreEnvia . "', '" . $apellidoPaternoEnvia . "', '" . $apellidoMaternoEnvia . "', '" . $correoEnvia . "', '" . $telefonoEnvia . "', '" . $rutEnvia . "');
//             ";

//     if ($rutRecibe != null and $rutEnvia != null) {
//         $insercion = pg_query($conexion, $sql);
//     } else {
//         echo "INGRESE CORRECTAMENTE TODOS LOS DATOS DE USUARIO";
//     }
// }

// $sql = "
//     INSERT INTO public.envio(
//     codigo, seguimiento, rut_destinatario, rut_remitente, calle, comuna, region, numero)
//     VALUES (0, 'En sucursal', " . $rutRecibe . ", " . $rutEnvia . ", '" . $calle . "', '" . $comuna . "', '" . $region . "', '" . $numero . "');
//             ";

// if ($calle != null and $comuna != null and $region != null and $numero != null) {
//     $insercion = pg_query($conexion, $sql);
// } else {
//     echo "INGRESE CORRECTAMENTE TODOS LOS DATOS DE ENVIO";
// }

// function getNumeroOrdenTransporte($conexionVariable)
// {
//     $numOrdenTransporte = 1;

//     //$conn = pg_connect("host=localhost dbname=KenderExpress user= postgres password=admin2021");
//     $conn = $conexionVariable;

//     $query = "SELECT * FROM envio";
//     $consulta = pg_query($conn,  $query);
//     if ($conn) {
//         if (pg_numrows($consulta) > 0) {
//             while ($obj = pg_fetch_object($consulta)) {
//                 $numOrdenTransporte = $obj->numero_orden_transporte;
//             }
//         }
//         return $numOrdenTransporte;
//     }
//     return 0;
// }

// $num_orden_transporte = getNumeroOrdenTransporte($conexion);

// $sql = "
//     UPDATE INTO public.encomienda(
// 	peso, largo, ancho, alto, remitente, numero_orden_transporte)
// 	VALUES (" . $peso . ", " . $largo . ", " . $ancho . ", " . $alto . ", '" . $nombreEnvia . "', " . $num_orden_transporte . ");
//             ";

$sql = "
    UPDATE public.envio
    SET seguimiento='" . $estado . "', calle='" . $calle . "', comuna='" . $comuna . "', region='" . $region . "', numero='" . $numero . "'
    WHERE numero_orden_transporte = " . $ordenDeTransporteActualizacion . ";
            ";            


$insercion = pg_query($conexion, $sql);

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