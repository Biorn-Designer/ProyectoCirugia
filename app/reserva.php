<?php

require_once('../vendor/autoload.php');

$idPaciente = $_GET['codpaci'];
$pacientes = array();
$mysqli = new mysqli("localhost","root","","proyecto_final");
$mysqli->set_charset('utf8');
$statement = $mysqli->prepare("SELECT * from customers WHERE codpaci = '4'");
$statement->execute();
$resultado = $statement->get_result();

//Extraer Datos de Paciente
$row = $resultado->fetch_assoc();

//Plantilla HTML
require_once('plantillas/reportes/reserva.php');

//Codigo CSS 

$css = file_get_contents('plantillas/reportes/style.css');




$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getPlantilla($row);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();

$mysqli->close();