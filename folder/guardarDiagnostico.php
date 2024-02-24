<?php

if(!isset($_POST['diag']) || $_POST['diag'] == ""){
    $data = array("respuesta" => "false", "mensaje" => "Ingrese un Diagnostico Valido");
}
$diagnostico = $_POST['diag'];
$query="INSERT INTO diagnosticos (diagnostico) VALUES ('$diagnostico')";
 

 $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
 $ejecutar=$db->prepare($query)->execute();
 
    if($ejecutar){
        $data = array("respuesta" => "true", "mensaje" => "");
        echo json_encode($data);
    }else{
        $data = array("respuesta" => "falseS", "mensaje" => "Ingrese un Diagnostico Valido");
        echo json_encode($data);
    }

