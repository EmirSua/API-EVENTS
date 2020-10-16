<?php
include "config.php";
include "utils.php";


$username = "root";
$password = "";  // en mi caso tengo contraseña pero en casa caso introducidla aquí.
$host = "localhost";
$db = "dbs698552";

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    header("HTTP/1.1 200 OK");
    $conexion = mysqli_connect( $host, $username, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db( $conexion, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    $sql="CALL `GetEvents`('2020-10-15'); ";
    $resultado = mysqli_query( $conexion, $sql ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    $datos=[];
    while ($columna = mysqli_fetch_assoc( $resultado ))
    {
        /*echo "<tr>";
        echo "<td>" . $columna['Nombre_Evento'] . "</td> <td>" . $columna['Fecha'] . "</td>";
        echo "</tr>";¨*/
        array_push($datos,$columna);
    }
    print_r( json_encode($datos));
    mysqli_close( $conexion );
}

?>