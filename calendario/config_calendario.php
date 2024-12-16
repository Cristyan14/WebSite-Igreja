<?php
 
    $dbHost = 'localhost:3306'; // 
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'mensageiros';

try {    
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
   
}catch(PDOException $err){
    echo "Erro: Deu erro mano" . $err->getMessage();
}
 

?>
