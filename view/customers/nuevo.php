<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO customers (dnipa, nombrep,apellidop,direccion,comuna,prevision,prestacion,forma_pago,observacion,fecha_nacimiento,seguro,tele,sexo,email,cargo,estado) 
		VALUES (:dnipa, :nombrep, :apellidop,:direccion,:comuna,:prevision,:prestacion,forma_pago,:observacion,fecha_nacimiento, :seguro, :tele,:sexo,:email,:cargo,:estado)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':dnipa' => $_POST['dnipa'] , ':nombrep' => $_POST['nombrep'] , ':apellidop' => $_POST['apellidop'],':fecha_nacimiento' => $_POST['fechanacimiento']
		,':sexo' => $_POST['sexo'],':direccion' => $_POST['dire'],':comuna' => $_POST['comuna'],':tele' => $_POST['tele'],':prevision' => $_POST['prevision'],':prestacion' => $_POST['prestacion'],':forma_pago' => $_POST['pago'],':seguro' => $_POST['seguro'],':email' => $_POST['email'], 
		':cargo' => $_POST['cargo'], ':estado' => $_POST['estado'],':observacion' => $_POST['observacion'])) ) ? 'Paciente guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: ../../folder/customers.php');
	
?>