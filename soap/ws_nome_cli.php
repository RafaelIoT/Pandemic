<?php
require_once "lib/nusoap.php";
$client = new nusoap_client(
 'http://appserver-01.alunos.di.fc.ul.pt/~asw011/soap/ws_nome_serv.php'
);
$error = $client->getError();
$result = $client->call('infoJogo', array('numero' => $_POST["id1"]));
//handle errors
if ($client->fault) {
 //check faults
}
else {
 $error = $client->getError();
 //handle errors
    
$a = array("cidade e cubos","posicoes e cidades onde estao", "cidades onde estao e cidades para onde podem ir", "lista de centros de pesquisa","jogador a jogar");
$i=0;
if(count($result)==1){
    foreach($result as $row)
        echo $row;
}
else{
foreach($result as $row){
        echo "<h2>".$a[$i]."</h2>";
        $i++;
        echo "<pre>"; print_r(array_filter($row)); echo "</pre>";
    }
}
    
}
echo "<h2>Pedido</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Resposta</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";