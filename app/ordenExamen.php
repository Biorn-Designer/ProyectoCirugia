<?php

require_once('../vendor/autoload.php');
include '../folder/funcionesGenerales.php';
$codconsulta = $_GET['codconsulta'];
$pacientes = array();
$mysqli = new mysqli("localhost","root","","proyecto_final");
$mysqli->set_charset('utf8');
$statement = $mysqli->prepare("SELECT * from customers C JOIN consultas CON ON C.codpaci = CON.codpaci WHERE CON.id_consulta  = '$codconsulta'");
$statement->execute();
$resultado = $statement->get_result();

//Extraer Datos de Paciente
$row = $resultado->fetch_assoc();
$examenes = json_decode($row["soli_examen_p"]);
$dataEstudio = "";
     foreach ($examenes as $estudio) {
      $dataEstudio .= $estudio->nombreExamen." , ";
     }

//Plantilla HTML
require_once('plantillas/reportes/ordenExamen.php');

//Codigo CSS 
$css = file_get_contents('plantillas/reportes/style.css');

// Base de Datos 
require_once('pacientes.php');

$mpdf = new \Mpdf\Mpdf([

]);

$plantilla = getPlantilla($row, $dataEstudio);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);


$mpdf->Output();