<link rel="stylesheet" href="CSS/main.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">

<?php
include 'conexion.php';

echo '<center>';
echo '<center style="width:50%">';

echo "<br>";
echo "<br>";

$ordenDeTransporteActualizacion = $_POST['inputId'];
$remitente = $_POST['inputRemitente'];

$sql = "
    UPDATE public.sobre
    SET remitente= '" . $remitente . "'
    WHERE numero_orden_transporte=" . $ordenDeTransporteActualizacion . ";
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