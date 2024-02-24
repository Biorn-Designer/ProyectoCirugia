<?php


    $idDocumento = $_POST['idDocumento'];
 
    include_once('../view/config/dbconect.php');
    $database = new Connection();
    $db = $database->open();
 $query="SELECT * FROM archivos_paciente WHERE id_archivo = '$idDocumento'";


 foreach($db->query($query) as $row){
     
if(file_exists('archivosPacientes/'.$row['nombre_archivo'])){
    if(unlink('archivosPacientes/'.$row['nombre_archivo'])) {
        $queryDelete = "DELETE FROM archivos_paciente WHERE id_archivo = '$idDocumento'";
        $ejecutar = $db->prepare($queryDelete)->execute();
        if($ejecutar){
            $data = array("respuesta" => "true", "mensaje" => "ELIMINADO");
            echo json_encode($data);
        }else{
            $data = array("respuesta" => "false", "mensaje" => "NO SE PUDO ELIMINAR EL ARCHIVO");
            echo json_encode($data);
        }
      } else {
       $data = array("respuesta" => "false", "mensaje" => "NO SE PUDO ELIMINAR EL ARCHIVO");
       echo json_encode($data);
      }
}else{
    $queryDelete = "DELETE FROM archivos_paciente WHERE id_archivo = '$idDocumento'";
    $ejecutar = $db->prepare($queryDelete)->execute();
    if($ejecutar){
        $data = array("respuesta" => "true", "mensaje" => "ELIMINADO");
        echo json_encode($data);
    }else{
        $data = array("respuesta" => "false", "mensaje" => "NO SE PUDO ELIMINAR EL ARCHIVO");
        echo json_encode($data);
    }
}

    
    
   
 }
 

?>