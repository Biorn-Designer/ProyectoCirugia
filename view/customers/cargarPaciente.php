<?php
session_start();
include_once('../config/dbconect.php');

	$database = new Connection();
	$db = $database->open();

		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("SELECT * FROM customers WHERE codpaci = :codPaci");
		//instrucción if-else en la ejecución de nuestra declaración preparada
        $idPaciente = $_POST['idPaciente'];
        $stmt->bindValue(":codPaci", $idPaciente, PDO::PARAM_INT);
        $stmt->execute();
        $dataInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        $retorno = array("respuesta" => "true", "dataInfo" => $dataInfo);
        echo json_encode($retorno);


?>