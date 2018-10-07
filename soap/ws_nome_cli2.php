<?php
require_once "lib/nusoap.php";
$client = new nusoap_client(
 'http://appserver-01.alunos.di.fc.ul.pt/~asw011/soap/ws_nome_serv.php'
);
$error = $client->getError();
$result = $client->call('fazJogada', array('id' => $_POST["e"], 'username' => $_POST["f"], 'password' => $_POST["g"], 'jogada' => $_POST["h"],'cidade' => $_POST["i"]));
//handle errors
if ($client->fault) {
 //check faults
}
else {
 $error = $client->getError();
 //handle errors

    echo $result;
}
echo "<h2>Pedido</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Resposta</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";