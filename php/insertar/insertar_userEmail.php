<link rel="stylesheet" href="CSS/main.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">

<?php
include '../conexion.php';

echo '<center>';
echo '<center style="width:50%">';

echo "<br>";
echo "<br>";

$username = $_POST['inputName'];
$useremail = $_POST['inputEmail'];

if ($username != null and $useremail != null)
{
    $sql = "INSERT INTO `user`(`username`, `useremail`) VALUES ('".$username."','".$useremail."')";
    $insercion = mysqli_query($conexion, $sql);
    echo "Se registro su usuario y correo correctamente";
} 
else 
{
    echo "Ingrese correctamente su usuario y correo";
}

echo "<br>";
echo "<br>";

echo "<a href='../../index.html'> CLICK PARA REGRESAR </a>";

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