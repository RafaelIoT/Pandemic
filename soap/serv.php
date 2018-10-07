<?php
require_once "lib/nusoap.php";
function infoJogo($numero) {
    $dbhost = "appserver-01.alunos.di.fc.ul.pt";
    $dbuser = "asw011";
    $dbpass = "asw011";
    $dbname = "asw011";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_error()) {
     die("Database connection failed:".mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM pandemic WHERE id=$numero";
    $result = mysqli_query($conn, $sql); 
    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
     $html[] = "<tr><td>" .
     implode("</td><td>", $row) .
     "</td></tr>";
    }
    $html = "<table>" . implode("\n", $html) . "</table>";
    return $html;
}

function fazJogada($id,$username,$password,$jogada,$cidade) {
    $dbhost = "appserver-01.alunos.di.fc.ul.pt";
    $dbuser = "asw011";
    $dbpass = "asw011";
    $dbname = "asw011";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_error()) {
     die("Database connection failed:".mysqli_connect_error());
    }


    
}

$server = new soap_server();
$server->register("infoJogo", // nome metodo
 array('numero' => 'xsd:string'), // input
 array('return' => 'xsd:string'), // output
 'uri:cumpwsdl', // namespace
 'urn:cumpwsdl#saudacao', // SOAPAction
 'rpc', // estilo
 'encoded' // uso
 );

$server->register("fazJogada", // nome metodo
 array('id' => 'xsd:string'), // input
 array('return' => 'xsd:string'), // output
 'uri:cumpwsdl', // namespace
 'urn:cumpwsdl#fazJogada', // SOAPAction
 'rpc', // estilo
 'encoded' // uso
 );
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA); ?>