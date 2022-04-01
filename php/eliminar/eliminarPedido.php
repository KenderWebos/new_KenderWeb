<link rel="stylesheet" href="CSS/main.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">

<?php
include 'conexion.php';

//$conexion=pg_connect("host=localhost dbname=KenderExpress user= postgres password=admin2021");
$conexion=$conexion;

$index = $_POST["index"];
deleteEnvio($index, $conexion);

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
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Busca tu envio" aria-label="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Buscar</button>
          </form>
    </nav>

    ';

function deleteEnvio($num1,$conexion){
        
    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
    echo "<br>";

    echo "<p> BORRANDO ENCOMIENDA... </p> <br>";

    $queryEncomienda="SELECT * FROM encomienda";
    $consultaEncomienda=pg_query($conexion,  $queryEncomienda);
    if(pg_numrows($consultaEncomienda)>0){
        while($obj=pg_fetch_object($consultaEncomienda)){
            
            if($num1==$obj->numero_orden_transporte){

            echo "Numero orden Transporte: ".$obj->numero_orden_transporte."<br>";
            echo "Peso: ".$obj->peso."<br>";
            echo "Largo: ".$obj->largo."<br>";
            echo "Ancho: ".$obj->ancho."<br>";
            echo "Alto: ".$obj->alto."<br>";
            echo "Remitente: ".$obj->remitente."<br>";
            echo "id Encomienda: ".$obj->id_encomienda."<br>";

            echo "_ELIMINADO_ <br>";
            
            echo "<br>";

            $queryEncomienda="
                DELETE FROM public.encomienda
                WHERE numero_orden_transporte = ".$num1.";
            ";
            $consultaEncomienda=pg_query($conexion,  $queryEncomienda); // se borran los datos

            break;
            }
            elseif($num1=='Todos'){
                echo "Numero orden Transporte: ".$obj->numero_orden_transporte."<br>";
                echo "Peso: ".$obj->peso."<br>";
                echo "Largo: ".$obj->largo."<br>";
                echo "Ancho: ".$obj->ancho."<br>";
                echo "Alto: ".$obj->alto."<br>";
                echo "Remitente: ".$obj->remitente."<br>";
                echo "id Encomienda: ".$obj->id_encomienda."<br>";
                
                echo "<br>";
            }
           
        }
      
    }
    echo "<p> CONSULTANDO SOBRE... </p> <br>";

    $querySobre="SELECT * FROM sobre";
    $consultaSobre=pg_query($conexion,  $querySobre);
    if(pg_numrows($consultaSobre)>0){
        while($obj=pg_fetch_object($consultaSobre)){
            
            if($num1==$obj->numero_orden_transporte){

                echo "Remitente: ".$obj->remitente."<br>";
                echo "Id Sobre: ".$obj->id_sobre."<br>";
                echo "Numero orden transporte: ".$obj->numero_orden_transporte."<br>";
                echo "<br>";

                echo "_ELIMINADO_ <br>";

                $queryEncomienda="
                    DELETE FROM public.sobre
                    WHERE numero_orden_transporte = ".$num1.";
                ";
                $consultaEncomienda=pg_query($conexion,  $queryEncomienda); // se borran los datos
            break;
            }
            elseif($num1=='Todos'){
                echo "Remitente: ".$obj->remitente."<br>";
                echo "Id Sobre: ".$obj->id_sobre."<br>";
                echo "Numero orden transporte: ".$obj->numero_orden_transporte."<br>";
                echo "<br>";
            }
           
        }
      
    }

    echo "<p> CONSULTANDO DINERO... </p> <br>";

    $queryDinero="SELECT * FROM dinero";
    $consultaDinero=pg_query($conexion,  $queryDinero);
    if(pg_numrows($consultaDinero)>0)
    {
        
        while($obj=pg_fetch_object($consultaDinero)){
            
            if($num1==$obj->numero_orden_transporte){

                echo "Numero orden transporte: ".$obj->numero_orden_transporte."<br>";
                echo "Remitente: ".$obj->remitente."<br>";
                echo "Id Dinero: ".$obj->id_dinero."<br>";

                echo "_ELIMINADO_ <br>";
                
                echo "<br>";

                $queryEncomienda="
                    DELETE FROM public.dinero
                    WHERE numero_orden_transporte = ".$num1.";
                    ";
                $consultaEncomienda=pg_query($conexion,  $queryEncomienda); // se borran los datos
            break;
            }
            elseif($num1=='Todos'){
                echo "Numero orden transporte: ".$obj->numero_orden_transporte."<br>";
                echo "Remitente: ".$obj->remitente."<br>";
                echo "Id Dinero: ".$obj->id_dinero."<br>";  
                echo "<br>";
            }
           
        }
      
    }

    echo "<p> CONSULTANDO ENVIOS... </p> <br>";

    $queryEnvio="SELECT * FROM envio";
    $consultaEnvio=pg_query($conexion,  $queryEnvio);
    if(pg_numrows($consultaEnvio)>0){
        while($obj=pg_fetch_object($consultaEnvio)){
            
            if($num1==$obj->numero_orden_transporte){
            
                echo "Nro Orden Transporte: ".$obj->numero_orden_transporte."<br>";
                echo "Codigo: ".$obj->codigo."<br>";
                echo "Seguimiento: ".$obj->seguimiento."<br>";
                echo "Rut destinatario: ".$obj->rut_destinatario."<br>";
                echo "id_direccion_sucursal: ".$obj->id_direccion_sucursal."<br>";
                echo "Rut remitente: ".$obj->rut_remitente."<br>";
                echo "Calle: ".$obj->calle."<br>";
                echo "Comuna: ".$obj->comuna."<br>";
                echo "Region: ".$obj->region."<br>";
                echo "Numero: ".$obj->numero."<br>";
                echo "<br>";

                echo "_ELIMINADO_ <br>";

                $queryEncomienda="
                    DELETE FROM public.envio
                    WHERE numero_orden_transporte = ".$num1.";
                ";
                $consultaEncomienda=pg_query($conexion,  $queryEncomienda); // se borran los datos
            break;
            }
            elseif($num1=='Todos'){
                echo "Nro Orden Transporte: ".$obj->numero_orden_transporte."<br>";
                echo "Codigo: ".$obj->codigo."<br>";
                echo "Seguimiento: ".$obj->seguimiento."<br>";
                echo "Rut destinatario: ".$obj->rut_destinatario."<br>";
                echo "id_direccion_sucursal: ".$obj->id_direccion_sucursal."<br>";
                echo "Rut remitente: ".$obj->rut_remitente."<br>";
                echo "Calle: ".$obj->calle."<br>";
                echo "Comuna: ".$obj->comuna."<br>";
                echo "Region: ".$obj->region."<br>";
                echo "Numero: ".$obj->numero."<br>";
                echo "<br>";
            }
           
        }
      
    }

    

    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
}


?>