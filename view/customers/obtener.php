<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$codpaci  = $_GET['codpaci'];
			$rut = $_POST['dnipa'];
			$nombres = $_POST['nombrep'];
			$apellidos = $_POST['apellidop'];
			$fechaNacimiento = $_POST['fechanacimiento'];
			$sexo = $_POST['sexo'];
			$direccion = $_POST['dire'];
			$comuna = $_POST['comuna'];
			$telefono = $_POST['tele'];
			$prevision = $_POST['prevision'];
			$prestacion = $_POST['prestacion'];
			$formaPago = $_POST['pago'];
			$correo = $_POST['correo'];
			$observacion = $_POST['observacion'];
			
			$sql = "UPDATE customers SET dnipa = '$rut',nombrep = '$nombres',apellidop = '$apellidos',
			fecha_nacimiento = '$fechaNacimiento',sexo='$sexo',direccion='$direccion,comuna='$comuna',
			tele='$telefono',prevision='$prevision',prestacion='$prestacion',forma_pago='$formaPago',email='$correo',
			obserbacion='$observacion' WHERE codpaci = '$codpaci'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Área actualizado correctamente' : 'No se puso actualizar el área';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../../folder/customers.php');

?>