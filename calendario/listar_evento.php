<?php
include_once("config_calendario.php");

$query_evento = "SELECT * from eventos";


$result = $conn->prepare($query_evento);

$result->execute();

$eventos = [];

while($row_events = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row_events);
    $eventos[] = [
        'id' => $row_events['id'],    
        'title' => $row_events['title'],   
        'start' => date('Y-m-d\TH:i:s', strtotime($row_events['start'])), 
        'end' => date('Y-m-d\TH:i:s', strtotime($row_events['end'])),    
        'color' => $row_events['color'], 
    ];

}

echo json_encode($eventos);
?>