<link rel="stylesheet" href="CSS/main.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">

<?php
$conexion = pg_connect("host=localhost dbname=KenderExpress user= postgres password=admin2021");

$index = $_POST["index"];
getEnvioPlus($index, $conexion);

echo '

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../../../index.html">KenderExpress</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="../../../index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <!--li class="nav-item">
              <a class="nav-link" href="http://www.kenderweb.tk">More</a>
            </li-->
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Iniciar sesion</a>
            </li>
          </ul>
        </div>
        <form class="form-inline" action="../php/consultarPedidosXD.php" method="post">
            <input class="form-control mr-sm-2" name="index" type="search" placeholder="Busca tu envio" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </nav>

    ';

function getEnvioPlus($num1, $conexion)
{

    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
    echo "<br>";

    echo "<p> CONSULTANDO ENCOMIENDA... </p> ";

    $queryEncomienda = "SELECT * FROM encomienda";
    $consultaEncomienda = pg_query($conexion,  $queryEncomienda);
    if (pg_numrows($consultaEncomienda) > 0) {
        while ($obj = pg_fetch_object($consultaEncomienda)) {

            if ($num1 == $obj->numero_orden_transporte) {

                echo '
                <center style="width:50%">
            <form style="background-color:gray" action="../php/updateEncomienda.php" method="post">
            <h3>INGRESE LOS DATOS ACTUALIZADOS DE LA ENCOMIENDA</h3>
            
            <div class="form-group">
                <label for="exampleInputNombre">Orden de pedido: </label>
                <input type="text" class="form-control" name="inputId" placeholder="Este es el numero de orden de pedido" value ="' . $obj->numero_orden_transporte . '">
            </div>
    
                    <div class="form-group">
                        <label for="exampleInputNombre">Peso: </label>
                        <input type="text" class="form-control" name="inputPeso" placeholder="Ingrese el peso del paquete" value ="' . $obj->peso . '">
                    </div>
    
                    <div class="form-group">
                        <label for="exampleInputNombre">Largo: </label>
                        <input type="text" class="form-control" name="inputLargo" placeholder="Ingrese el largo del paquete" value ="' . $obj->largo . '">
                    </div>
    
                    <div class="form-group">
                        <label for="exampleInputNombre">Ancho: </label>
                        <input type="text" class="form-control" name="inputAncho" placeholder="Ingrese el ancho del paquete" value ="' . $obj->ancho . '">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputNombre">Alto: </label>
                        <input type="text" class="form-control" name="inputAlto" placeholder="Ingrese el alto del paquete" value ="' . $obj->alto . '">
                    </div>
    
                    <!-- ------------------------------------------------------------------------------------------------------------------ -->
                    
                    <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
            </center>
            ';

                echo "Numero orden Transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "Peso: " . $obj->peso . "<br>";
                echo "Largo: " . $obj->largo . "<br>";
                echo "Ancho: " . $obj->ancho . "<br>";
                echo "Alto: " . $obj->alto . "<br>";
                echo "Remitente: " . $obj->remitente . "<br>";
                echo "id Encomienda: " . $obj->id_encomienda . "<br>";

                echo "<br>";
                break;
            } elseif ($num1 == 'Todos') {
                echo "Numero orden Transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "Peso: " . $obj->peso . "<br>";
                echo "Largo: " . $obj->largo . "<br>";
                echo "Ancho: " . $obj->ancho . "<br>";
                echo "Alto: " . $obj->alto . "<br>";
                echo "Remitente: " . $obj->remitente . "<br>";
                echo "id Encomienda: " . $obj->id_encomienda . "<br>";

                echo "<br>";
            }
        }
    }
    echo "<p> CONSULTANDO SOBRE... </p> <br>";

    $querySobre = "SELECT * FROM sobre";
    $consultaSobre = pg_query($conexion,  $querySobre);
    if (pg_numrows($consultaSobre) > 0) {
        while ($obj = pg_fetch_object($consultaSobre)) {

            if ($num1 == $obj->numero_orden_transporte) {



                echo "Remitente: " . $obj->remitente . "<br>";
                echo "Id Sobre: " . $obj->id_sobre . "<br>";
                echo "Numero orden transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "<br>";
                break;
            } elseif ($num1 == 'Todos') {
                echo "Remitente: " . $obj->remitente . "<br>";
                echo "Id Sobre: " . $obj->id_sobre . "<br>";
                echo "Numero orden transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "<br>";
            }
        }
    }

    echo "<p> CONSULTANDO DINERO... </p> <br>";

    $queryDinero = "SELECT * FROM dinero";
    $consultaDinero = pg_query($conexion,  $queryDinero);
    if (pg_numrows($consultaDinero) > 0) {

        while ($obj = pg_fetch_object($consultaDinero)) {

            if ($num1 == $obj->numero_orden_transporte) {

                echo "Numero orden transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "Remitente: " . $obj->remitente . "<br>";
                echo "Id Dinero: " . $obj->id_dinero . "<br>";
                echo "Monto: " . $obj->monto . "<br>";

                echo "<br>";
                break;
            } elseif ($num1 == 'Todos') {
                echo "Numero orden transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "Remitente: " . $obj->remitente . "<br>";
                echo "Id Dinero: " . $obj->id_dinero . "<br>";
                echo "Monto: " . $obj->monto . "<br>";
                echo "<br>";
            }
        }
    }

    echo "<p> CONSULTANDO ENVIOS... </p> <br>";

    $queryEnvio = "SELECT * FROM envio";
    $consultaEnvio = pg_query($conexion,  $queryEnvio);
    if (pg_numrows($consultaEnvio) > 0) {
        while ($obj = pg_fetch_object($consultaEnvio)) {

            if ($num1 == $obj->numero_orden_transporte) {

                echo "Nro Orden Transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "Codigo: " . $obj->codigo . "<br>";
                echo "Seguimiento: " . $obj->seguimiento . "<br>";
                echo "Rut destinatario: " . $obj->rut_destinatario . "<br>";
                echo "id_direccion_sucursal: " . $obj->id_direccion_sucursal . "<br>";
                echo "Rut remitente: " . $obj->rut_remitente . "<br>";
                echo "Calle: " . $obj->calle . "<br>";
                echo "Comuna: " . $obj->comuna . "<br>";
                echo "Region: " . $obj->region . "<br>";
                echo "Numero: " . $obj->numero . "<br>";
                echo "<br>";
                break;
            } elseif ($num1 == 'Todos') {
                echo "Nro Orden Transporte: " . $obj->numero_orden_transporte . "<br>";
                echo "Codigo: " . $obj->codigo . "<br>";
                echo "Seguimiento: " . $obj->seguimiento . "<br>";
                echo "Rut destinatario: " . $obj->rut_destinatario . "<br>";
                echo "id_direccion_sucursal: " . $obj->id_direccion_sucursal . "<br>";
                echo "Rut remitente: " . $obj->rut_remitente . "<br>";
                echo "Calle: " . $obj->calle . "<br>";
                echo "Comuna: " . $obj->comuna . "<br>";
                echo "Region: " . $obj->region . "<br>";
                echo "Numero: " . $obj->numero . "<br>";
                echo "<br>";
            }
        }
    }

    



    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
}


?>