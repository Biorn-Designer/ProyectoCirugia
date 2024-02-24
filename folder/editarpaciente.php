<?php

    $idPaciente = $_POST['idPaciente'];
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

 $query="UPDATE customers SET dnipa='$rut',nombrep='$nombres',apellidop='$apellidos',direccion='$direccion',comuna='$comuna',
 tele='$telefono',prevision='$prevision',prestacion='$prestacion',forma_pago='$formaPago',email='$correo',obserbacion='$observacion' 
 WHERE codpaci='$idPaciente'";
 
 
 $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
 $ejecutar=$db->prepare($query)->execute();
 
    if($ejecutar){
        //$id = $db->lastInsertId();
        echo '<script>alert("Paciente Modificado correctamente");
        window.location.replace("customers.php");
        </script>';
    }else{
        echo 'Ha ocurrido un error, intentelo denuevo';
    }
?>