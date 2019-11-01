<?php
  
  header('Content-Type: text/html; charset=ISO-8859-1'); 
  require_once('lib/nusoap.php');
  //Parámetros
  $codMateria = "999";

  
  //url del webservice
  $wsdl="http://acadtest.ucaldas.edu.co:8084/wsprueba.asmx?wsdl";
  
  //instanciando un nuevo objeto cliente para consumir el webservice
  $client=new nusoap_client($wsdl,'wsdl');
  //pasando los parámetros a un array
  $param=array('programa'=>$codMateria);
  //llamando al método y pasándole el array con los parámetros
  $resultado = $client->call('getmateria', $param);

  echo "<h1>Consumir web service</h1>";

 foreach($resultado as $r){
   for($i=0;$i<strlen($r);$i++){
       if($r[$i] == "}"){
           $i++;
           echo"<hr>";
           echo"<br>";
       }elseif($r[$i] == "{" ){
        $i++;
      }elseif($r[$i] == ","){
        $r[$i]="-";
      }
       
       echo $r[$i];
   }
 }
?>

 