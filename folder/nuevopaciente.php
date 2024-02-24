<?php


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

 $query="INSERT INTO customers (dnipa, nombrep, apellidop,fecha_nacimiento, sexo, direccion, comuna, tele, 
 prevision, prestacion, forma_pago,email,obserbacion) 
 VALUES ('$rut', '$nombres', '$apellidos', '$fechaNacimiento', '$sexo', '$direccion', '$comuna', '$telefono',
'$prevision','$prestacion', '$formaPago', '$correo','$observacion')";

 $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
 $ejecutar=$db->prepare($query)->execute();
 
    if($ejecutar){
        //$id = $db->lastInsertId();
        echo '<script>alert("Paciente Agregado correctamente");
        window.location.replace("customers.php");
        </script>';
    }else{
        echo 'Ha ocurrido un error, intentelo denuevo';
    }
?>