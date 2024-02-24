<?php
session_start();
include_once('../config/dbconect.php');

	$database = new Connection();
	$db = $database->open();

		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("SELECT CON.id_consulta, CON.fecha_consulta, CON.codpaci, C.nombrep, C.apellidop FROM customers C JOIN consultas CON ON C.codpaci = CON.codpaci WHERE CON.codpaci = :codPaci ORDER BY CON.id_consulta DESC" );
		//instrucción if-else en la ejecución de nuestra declaración preparada
        $idPaciente = $_POST['idPaciente'];
        $stmt->bindValue(":codPaci", $idPaciente, PDO::PARAM_INT);
        $stmt->execute();
        $dataInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $retorno = array("respuesta" => "true", "dataInfo" => $dataInfo);
        echo json_encode($retorno);


?>