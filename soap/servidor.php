<?php
require_once "lib/nusoap.php";
function saudacao($nome) {
return "ola";
}
$server = new soap_server();
$server->register("saudacao",  // nome metodo
array('nome' => 'xsd:string'),      // input
array('return' => 'xsd:string'),    // output 
'uri:cumpwsdl',                   // namespace
'urn:cumpwsdl#saudacao',      // SOAPAction
'rpc',                         // estilo
'encoded'                      // uso
);
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>