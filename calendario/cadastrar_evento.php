<?php
include_once("config.php");

$title = $_POST['title'];
$color = $_POST['color'];
$start = $_POST['start'];
$end = $_POST['end'];

$sql = "INSERT INTO eventos ( title, color, start, end) VALUES (?,?,?,?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssss", $title, $color, $start, $end);


$stmt->execute();

$stmt->close();

?>