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

    echo "<p> BORRANDO Cliente Empresa... </p> <br>";

    $queryClienteE="SELECT * FROM cliente_empresa";
    $consultaClienteE=pg_query($conexion,  $queryClienteE);
    if(pg_numrows($consultaClienteE)>0){
        while($obj=pg_fetch_object($consultaClienteE)){
            
            if($num1==$obj->rut){
            echo "Rut Empresa: ".$obj->rut_empresa."<br>";
            echo "Rut: ".$obj->rut."<br>";
            echo "Usuario: ".$obj->usuario."<br>";
            echo "Razon Social: ".$obj->razon_social."<br>";
            echo "Direccion: ".$obj->direccion."<br>";
            echo "Telefono: ".$obj->telefono."<br>";
            echo "Numero: ".$obj->numero."<br>";
            echo "Region: ".$obj->region."<br>";
            echo "Comuna: ".$obj->comuna."<br>";
            echo "Calle: ".$obj->calle."<br>";
            
            
            echo "_ELIMINADO_ <br>";
            
            echo "<br>";

            $queryClienteE="
                DELETE FROM public.cliente_empresa
                WHERE rut = '".$num1."';
            ";
            $consultaClienteE=pg_query($conexion,  $queryClienteE); // se borran los datos

            break;
            }
            elseif($num1=='Todos'){
                echo "Rut Empresa: ".$obj->rut_empresa."<br>";
                echo "Rut: ".$obj->rut."<br>";
                echo "Usuario: ".$obj->usuario."<br>";
                echo "Razon Social: ".$obj->razon_social."<br>";
                echo "Direccion: ".$obj->direccion."<br>";
                echo "Telefono: ".$obj->telefono."<br>";
                echo "Numero: ".$obj->numero."<br>";
                echo "Region: ".$obj->region."<br>";
                echo "Comuna: ".$obj->comuna."<br>";
                echo "Calle: ".$obj->calle."<br>";
                
                echo "<br>";
            }
           
        }
      
    }

    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
    echo "<br>";

    echo "<p> BORRANDO Cliente Natural... </p> <br>";

    $queryClienteN="SELECT * FROM cliente_natural";
    $consultaClienteN=pg_query($conexion,  $queryClienteN);
    if(pg_numrows($consultaClienteN)>0){
        while($obj=pg_fetch_object($consultaClienteN)){
            
            if($num1==$obj->rut){
            echo "Contraseña: ".$obj->contrasena."<br>";
            echo "Numero: ".$obj->numero."<br>";
            echo "Comuna: ".$obj->comuna."<br>";
            echo "Region: ".$obj->region."<br>";
            echo "Rut cliente natural: ".$obj->rut_cliente_natural."<br>";
            echo "Rut: ".$obj->rut."<br>";
            
            
            
            echo "_ELIMINADO_ <br>";
            
            echo "<br>";

            $queryClienteN="
                DELETE FROM public.cliente_natural
                WHERE rut = '".$num1."';
            ";
            $consultaClienteE=pg_query($conexion,  $queryClienteN); // se borran los datos

            break;
            }
            elseif($num1=='Todos'){
                echo "Contraseña: ".$obj->contraseña."<br>";
                echo "Numero: ".$obj->numero."<br>";
                echo "Comuna: ".$obj->comuna."<br>";
                echo "Region: ".$obj->region."<br>";
                echo "Rut cliente natural: ".$obj->rut_cliente_natural."<br>";
                echo "Rut: ".$obj->rut."<br>";
                
                echo "<br>";
            }
           
        }
      
    }

    echo "<p> BORRANDO Cliente... </p> <br>";

    $queryCliente="SELECT * FROM cliente";
    $consultaCliente=pg_query($conexion,  $queryCliente);
    if(pg_numrows($consultaCliente)>0){
        while($obj=pg_fetch_object($consultaCliente)){
            
            if($num1==$obj->rut){

            echo "Nombre: ".$obj->nombre."<br>";
            echo "Apellido Paterno: ".$obj->apellido_paterno."<br>";
            echo "Apellido Materno: ".$obj->apellido_materno."<br>";
            echo "Correo: ".$obj->correo."<br>";
            echo "Telefono: ".$obj->telefono."<br>";
            echo "Rut: ".$obj->rut."<br>";
            echo "Rut Empresa: ".$obj->rut_empresa."<br>";
            echo "Id Destinatario: ".$obj->id_destinatario."<br>";
            echo "Rut Cliente Natural: ".$obj->rut_cliente_natural."<br>";

            echo "_ELIMINADO_ <br>";
            
            echo "<br>";

            $queryCliente="
                DELETE FROM public.cliente
                WHERE rut = '".$num1."';
            ";
            $consultaCliente=pg_query($conexion,  $queryCliente); // se borran los datos

            break;
            }
            elseif($num1=='Todos'){
                echo "Nombre: ".$obj->nombre."<br>";
                 echo "Apellido Paterno: ".$obj->apellido_paterno."<br>";
                  echo "Apellido Materno: ".$obj->apellido_materno."<br>";
                 echo "Correo: ".$obj->correo."<br>";
                  echo "Telefono: ".$obj->telefono."<br>";
                 echo "Rut: ".$obj->rut."<br>";
                 echo "Rut Empresa: ".$obj->rut_empresa."<br>";
                 echo "Id Destinatario: ".$obj->id_destinatario."<br>";
                  echo "Rut Cliente Natural: ".$obj->rut_cliente_natural."<br>";
                
                echo "<br>";
            }
           
        }
      
    }

    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
    echo "<br>";echo "<p> BORRANDO Cliente... </p> <br>";

    $queryCliente="SELECT * FROM cliente";
    $consultaCliente=pg_query($conexion,  $queryCliente);
    if(pg_numrows($consultaCliente)>0){
        while($obj=pg_fetch_object($consultaCliente)){
            
            if($num1==$obj->rut){

            echo "Nombre: ".$obj->nombre."<br>";
            echo "Apellido Paterno: ".$obj->apellido_paterno."<br>";
            echo "Apellido Materno: ".$obj->apellido_materno."<br>";
            echo "Correo: ".$obj->correo."<br>";
            echo "Telefono: ".$obj->telefono."<br>";
            echo "Rut: ".$obj->rut."<br>";
            echo "Rut Empresa: ".$obj->rut_empresa."<br>";
            echo "Id Destinatario: ".$obj->id_destinatario."<br>";
            echo "Rut Cliente Natural: ".$obj->rut_cliente_natural."<br>";

            echo "_ELIMINADO_ <br>";
            
            echo "<br>";

            $queryCliente="
                DELETE FROM public.cliente
                WHERE rut = '".$num1."';
            ";
            $consultaCliente=pg_query($conexion,  $queryCliente); // se borran los datos

            break;
            }
            elseif($num1=='Todos'){
                echo "Nombre: ".$obj->nombre."<br>";
                 echo "Apellido Paterno: ".$obj->apellido_paterno."<br>";
                  echo "Apellido Materno: ".$obj->apellido_materno."<br>";
                 echo "Correo: ".$obj->correo."<br>";
                  echo "Telefono: ".$obj->telefono."<br>";
                 echo "Rut: ".$obj->rut."<br>";
                 echo "Rut Empresa: ".$obj->rut_empresa."<br>";
                 echo "Id Destinatario: ".$obj->id_destinatario."<br>";
                  echo "Rut Cliente Natural: ".$obj->rut_cliente_natural."<br>";
                
                echo "<br>";
            }
           
        }
      
    }

    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
    echo "<br>";

    echo "---------------------------------------------------------------------------------------------------------------------------------------------------------";
}


?>