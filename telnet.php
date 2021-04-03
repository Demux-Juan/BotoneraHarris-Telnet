<?php

$login="leitch\r";
$password="leitchadmin\r";
$length1=strlen($login);
$length2=strlen($password);
 $Level = "level 00";
$length3=strlen($Level);
$o = $_REQUEST["out"];
$i = $_REQUEST["in"];

echo $o."<br>";
echo  $i."<br>";
$int="SOURCE ".$i."\r";
$out="DESTINATION ".$o."\r";
$lengthint = strlen($int);
$lengthout = strlen($out);
$stop=2048;
$socket;
// $buf="MY BUFFER";

  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    $connected = socket_connect($socket, '192.168.10.6', 23);
    // sleep(1);
    
   /* $logserver = socket_read($socket ,$stop,PHP_BINARY_READ);
    echo $logserver;  */
   // sleep(1);
   socket_write($socket, $login, $length1);
   sleep(1);
   /*$logpass = socket_read($socket ,$stop,PHP_BINARY_READ);
   echo $logpass; */
    socket_write($socket, $password,$length2);
   sleep(1);

   $logged = socket_read($socket ,$stop,PHP_BINARY_READ);
   // echo $logged; 
   socket_write($socket, "LEVEL 00\r",10);
   //sleep(1);
   socket_write($socket,$int,$lengthint);
  // sleep(1);
   socket_write($socket,$out,$lengthout);
  // sleep(1);
  $query = socket_read($socket ,$stop,PHP_BINARY_READ);
   // echo $query;  
  
  socket_write($socket, "read\r",6);
   sleep(1);
   $q = socket_read($socket ,$stop,PHP_BINARY_READ);
   //echo $q; 
   //echo "<br><br><br><br>";
   
   $out1 = substr($q,21);
   echo $out1;

   socket_close($socket);    
 
// strpos($q,"00001") = 21->  first 00001, word read as a command 
// strpos($q,"00002") = 34->  first 00002, word read as a command 
// strpos($q,"00003") = 40->  first 00003, word read as a command 
   


// $passerver = socket_recv($socket ,$logserver,strlen($logserver),MSG_WAITALL);
// echo $passerver;










?>