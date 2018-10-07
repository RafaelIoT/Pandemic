<?php
require_once "lib/nusoap.php";
 
      $cities = array(
		'Algiers' => 'K','Cairo','Madrid','Paris','Istanbul',
		'Atlanta' => array('B','Miami','Washington','Chicago'),
		'Baghdad' => array('K','Karachi','Riyadh','Istanbul','Cairo','Tehran'),
		'Bangkok' => array('R','Jakarta','Chennai','Kolkata','HoChiMinhCity','HongKong'),
		'Beijing' => array('R','Shanghai','Seoul'),
		'Bogota' => array('Y','MexicoCity','Lima','Miami','SaoPaulo', 'BuenosAires'),
		'BuenosAires' => array('Y','SaoPaulo','Bogota'),
		'Cairo' => array('K','Riyadh','Algiers','Baghdad','Istanbul','Khartoum'),
		'Chennai' => array('K','Jakarta','Bangkok','Mumbai','Delhi','Kolkata'),
		'Delhi' => array('K','Kolkata','Karachi','Tehran','Mumbai','Chennai'),
		'Chicago' => array('B','Atlanta','SanFrancisco','LosAngeles','MexicoCity','Montreal'),
		'Essen' => array('B','London','Paris','StPetersburg','Milan'),
		'HoChiMinhCity' => array('R','Manila','Jakarta','Bangkok','HongKong'),
		'HongKong' => array('R','HoChiMinhCity','Manila','Bangkok','Taipei','Shanghai','Kolkata'),
		'Istanbul' => array('K','Baghdad','Cairo','Algiers','Milan','StPetersburg','Moscow', 'Baghdad'),
		'Jakarta' => array('R','HoChiMinhCity','Bangkok','Sydney','Chennai'),
		'Johannesburg' => array('Y','Kinshasa','Khartoum'),
		'Karachi' => array('K','Delhi','Tehran','Baghdad','Riyadh','Mumbai'),
		'Khartoum' => array('Y','Kinshasa','Johannesburg','Cairo','Lagos'),
		'Kinshasa' => array('Y','Lagos','Khartoum','Johannesburg'),
		'Kolkata' => array('K','HongKong','Bangkok','Chennai','Delhi'),
		'Lagos' => array('Y','Kinshasa','Khartoum','SaoPaulo'),
		'Lima' => array('Y','Santiago','Bogota','MexicoCity'),
		'London' => array('B','Essen','Paris','Madrid','NewYork'),
		'LosAngeles' => array('Y','Chicago','SanFrancisco','MexicoCity','Sydney'),
		'Madrid' => array('B','SaoPaulo','Paris','London','Algiers','NewYork'),
		'Manila' => array('R','Sydney','Taipei','HongKong','HoChiMinhCity','SanFrancisco'),
		'MexicoCity' => array('Y','Miami','LosAngeles','Bogota','Lima','Chicago'),
		'Miami' => array('Y','Washington','Bogota','MexicoCity','Atlanta'),
		'Milan' => array('B','Paris','Essen','Istanbul',''),
		'Montreal' => array('B','Washington','Chicago','NewYork'),
		'Moscow' => array('K','StPetersburg','Tehran','Istanbul'),
		'Mumbai' => array('K','Chennai','Karachi','Delhi',''),
		'NewYork' => array('B','London','Madrid','Washington','Montreal'),
		'Osaka' => array('R','Tokyo','Taipei'),
		'Paris' => array('B','Madrid','Algiers','London','Essen','Milan'),
		'Riyadh' => array('K','Karachi','Baghdad','Cairo'),
		'SanFrancisco' => array('B','Chicago','Tokyo','LosAngeles','Manila'),
		'Santiago' => array('Y','Lima'),
		'SaoPaulo' => array('Y','Madrid','Lagos','BuenosAires','Bogota'),
		'Seoul' => array('R','Beijing','Shanghai','Tokyo'),
		'Shanghai' => array('R','Beijing','Taipei','Seoul','Tokyo','HongKong'),
		'StPetersburg' => array('B','Essen','Moscow','Istanbul'),
		'Sydney' => array('R','Manila','Jakarta','LosAngeles'),
		'Taipei' => array('R','Osaka','Manila','HongKong','Shanghai'),
		'Tehran' => array('K','Kolkata','Moscow','Karachi','Baghdad','Delhi'),
		'Tokyo' => array('R','Seoul','Osaka','Shanghai','SanFrancisco'),
		'Washington' => array('B','NewYork','Miami','Atlanta','Montreal')

		);

function infoJogo($numero) {
    global $cities;
    
    $dbhost = "appserver-01.alunos.di.fc.ul.pt";
    $dbuser = "asw011";
    $dbpass = "asw011";
    $dbname = "asw011";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_error()) {
     die("Database connection failed:".mysqli_connect_error());
    }
    
    $query = "SELECT id FROM game WHERE name='$numero'";
    $result=mysqli_query($conn, $query) or die("Erro: a inserir a query");
    foreach($result as $row){
        $id = $row;
    }
    $id = $id["id"];
    $query = "SELECT id FROM pandemic WHERE id='$id'";
    $result=mysqli_query($conn, $query) or die("Erro: a inserir a query");
    foreach($result as $row){
        $numero = $row;
    }
    $numero = $numero["id"];
    

    
    $query = "SELECT id FROM pandemic WHERE id='$numero'";
    $result=mysqli_query($conn, $query) or die("Erro: a inserir a query");
    if(!mysqli_num_rows($result)>0){
        return array('Este jogo não existe');
    }
    
    $sql = "SELECT * FROM cities WHERE id=$numero";
    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
    $html = []; 
    $i=-1;
    foreach ($result as $row) {
        foreach($row as $cid){
            $i++;
        if ($cid!=NULL){
            $html[array_keys($row)[$i]] =  $cid ;
        }
        }
            }  


    $query = "SELECT nick,city FROM plays WHERE id=$numero";
    $result=mysqli_query($conn, $query) or die("Error: ".$que);
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
     $html2[] .= implode(" ", $row) ;
    }
    
    $nome = [];
    $cidade = [];
    for($i=0;$i<count($html2);$i++){

        $nome[] .= split(" ",$html2[$i])[0];
    }
    for($i=0;$i<count($html2);$i++){

        $cidade[] .= split(" ",$html2[$i])[1];
    }
    $show = [];
    for($a=0;$a<count($nome);$a++){
        $city = $cidade[$a];
        $adj = $cities[$city];
        $citiescol = $cities;
        array_shift($adj);
        $adj = array_filter($adj);
		for ($i=0; $i <sizeof($adj) ; $i++) {
			if($citiescol[$adj[$i]][0] == "K"){
				$color = "black";
			}elseif($citiescol[$adj[$i]][0] == "B"){
				$color = "blue";
			}elseif($citiescol[$adj[$i]][0] == "R"){
				$color = "red";
			}elseif($citiescol[$adj[$i]][0] == "Y"){
				$color = "#d1a000";
			}
			$show[] .= "De ".$city." pode ir para ".$adj[$i];
		}
    }
    
    $sql = "SELECT pandemic.plays FROM pandemic WHERE id=".$numero;
    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
    $jogar = mysqli_fetch_row($result);

    
    $sql = "SELECT pandemic.stations FROM pandemic WHERE id=".$numero;
    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
    foreach ($result as $key) 
		  {
		  $stations = $key;
		  }
    
    return array($html,$html2,$show, $stations, $jogar);
}


function fazJogada($id,$username,$password,$jogada,$cidade) {
    global $cities;
    $dbhost = "appserver-01.alunos.di.fc.ul.pt";
    $dbuser = "asw011";
    $dbpass = "asw011";
    $dbname = "asw011";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (mysqli_connect_error()) {
     die("Database connection failed:".mysqli_connect_error());
    }
    $pass = sha1($password);
    $sql = "SELECT * FROM registo WHERE nick='$username' and pass='$pass'";
    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
    if(mysqli_num_rows($result)>0){
        $sql = "SELECT pandemic.plays FROM pandemic WHERE id =".$id;
        $result=mysqli_query($conn, $sql) or die("Error: ".$que);
      		foreach ($result as $key) 
		      	{
		      			$turn = $key;
		      	}        
        $vez = $turn;
        if($vez["plays"]==$username){
        if($jogada=='move'){
            $sql = "UPDATE plays SET turn = turn+1 WHERE id=".$id." AND nick='".$username."'";
            $result=mysqli_query($conn, $sql) or die("Error: ".$que);
        
            $sql = "SELECT plays.city FROM plays WHERE id=".$id." AND nick='".$username."'";
            $result=mysqli_query($conn, $sql) or die("Error: ".$que);
            foreach ($result as $key) 
            {
                $city = $key;
            }
            $city =$city["city"];
            $citiescol = $cities;
            $adj = $cities[$city];
            array_shift($adj);
            $adj = array_filter($adj);
            $show = [];
            for ($i=0; $i < sizeof($adj) ; $i++) {
                if($citiescol[$adj[$i]][0] == "K"){
                    $color = "black";
                }elseif($citiescol[$adj[$i]][0] == "B"){
                    $color = "blue";
                }elseif($citiescol[$adj[$i]][0] == "R"){
                    $color = "red";
                }elseif($citiescol[$adj[$i]][0] == "Y"){
                    $color = "#d1a000";
                }
                $show[] .= $adj[$i];
            }
            foreach($show as $cid){
                if($cid==$cidade){
                    $sql = "UPDATE plays SET plays.city='".$cidade."' WHERE id=".$id." AND nick='".$username."'";
                    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
                    return "ACEITE";
                }
            }
            return "NAO ACEITE";

        }
        if($jogada=='treat'){
            $sql = "SELECT plays.city FROM plays WHERE id=".$id." AND nick='".$username."'";
            $result=mysqli_query($conn, $sql) or die("Error: ".$que);
            foreach ($result as $key) 
            {
                $city = $key;
            }
            $city =$city["city"];
            $sql = "SELECT $city FROM cities";
            $result=mysqli_query($conn, $sql) or die("Error: ".$que);
            foreach ($result as $key) 
            {
                $cubes = $key;
            }
            if($cubes[$city]-1>-1){
      		    $sql = "UPDATE cities SET ".$city."=".($cubes[$city]-1)." WHERE id=".$id;
      		    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
                return "Aceite";
            }
            else{
                return "Nao aceite";
            }
            
        }
        if($jogada=='create'){
            $sql = "SELECT plays.cartas FROM plays WHERE plays.id=".$id;
            $result=mysqli_query($conn, $sql) or die("Error: ".$que);
            $cards = mysqli_fetch_row($result);
                     
            $sql = "SELECT plays.city FROM plays WHERE id=".$id." AND nick='".$username."'";
            $result=mysqli_query($conn, $sql) or die("Error: ".$que);
            foreach ($result as $key) 
            {
                $city = $key;
            }
            $city =$city["city"];
                
                for ($i=0; $i < sizeof($cards); $i++) 
                { 
                    if ($cards[$i]["nick"]==$username)
                    {
                        $cities = explode(",", $cards[$i]["cartas"]);
                    }
                }
            $r=0;
            foreach(array_keys($cities) as $ci){
                if($city==$ci){
                    $r++;
                }
            }
            
            if($r!=0){
                    $sql = "SELECT pandemic.stations FROM pandemic WHERE id=".$id;
                    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
                    foreach ($result as $key) 
                        {
                            $stations = $key;
                        }
                    foreach($stations as $s){
                        $stat = split(",",$s);                     
                        foreach($stat as $stat2){
                            if($stat2==$city){
                            return "nao aceite";
                            }
                        }
                    }
                
                    $sta = implode(',', $stations);
                                echo var_dump($sta);
      	            $sta .= ",".$city;
                                echo var_dump($stations);
                
            $query = "SELECT nick,city FROM plays WHERE id=$id and nick='$username'";
            $result=mysqli_query($conn, $query) or die("Error: ".$que);
            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
             $html2[] .= implode(" ", $row) ;
            }
            $cidade = split(" ", $html2[0]);
            $p = implode(",",$cards);
            $o = split(",",$p);
            if(in_array($cidade[1],$o)){

                    $sql = "UPDATE pandemic SET pandemic.stations='".$sta."' WHERE pandemic.id=".$id;
                    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
                    
                    $sql = "SELECT plays.cartas FROM plays WHERE id=".$id." AND nick='".$username."'";
                    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
                    foreach ($result as $key) 
                    {
                        echo var_dump($key);
                        $cartas = $key;
                    }
                    $cartas = implode(",", $key);
                                        echo var_dump($cartas);
                $cartas2 = split(",",$cartas);
                echo var_dump($cartas2);

                    $i = array_search($city, $cartas2);
                    unset($cartas2[$i]);
                    $cartas2 = array_filter(array_values($cartas2));
                                echo var_dump($cartas2);


                    $sql = "UPDATE plays SET cartas='".(implode(",", $cartas2).",")."' WHERE id=".$id." AND nick='".$username."'";
                    $result=mysqli_query($conn, $sql) or die("Error: ".$que);
                    
            }
                else{
                    return "nao aceite";
                }
            }

        }
        }
        else{
            return 'Nao é a sua vez.';
        }
    }
    else{$result = $client->call('infoJogo', array('numero' => $_POST["id1"]));

        return 'O utilizador não existe';
    }
    
}

$server = new soap_server();
$server->register("infoJogo", // nome metodo
 array('numero' => 'xsd:string'), // input
 array('return' => 'xsd:complexType'), // output
 'uri:cumpwsdl', // namespace
 'urn:cumpwsdl#infoJogo', // SOAPAction
 'rpc', // estilo
 'encoded' // uso
 );

$server->register("fazJogada", // nome metodo
 array('id' => 'xsd:string','username' => 'xsd:string','password' => 'xsd:string','jogada' => 'xsd:string','cidade' => 'xsd:string'), // input
 array('return' => 'xsd:string'), // output
 'uri:cumpwsdl', // namespace
 'urn:cumpwsdl#fazJogada', // SOAPAction
 'rpc', // estilo
 'encoded' // uso
 );
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA); ?>