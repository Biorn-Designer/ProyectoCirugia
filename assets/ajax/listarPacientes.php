<?php require_once('../../view/config/conex.php'); 

 //INICIO LISTAR CLIENTE 
 if(isset($_GET['term']) && $_GET['term']!=""){
            
  $query_listar = mysqli_query($conex, "SELECT * FROM customers WHERE estado = 1 AND nombrep LIKE '%" .$_GET['term']."%' LIMIT 0 ,50"); 
  $data = array();
  while($row = mysqli_fetch_assoc($query_listar)){
      
      $data_row= array(
          "value" => $row['nombrep'] ." ". $row['apellidop'],
          "id_paciente" => $row['codpaci'],
          "nombre_paciente" => $row['nombrep'] ." ". $row['apellidop'], 
          
       );
      
      $data[] = $data_row;
  }
  echo json_encode($data);

}
//FIN LISTAR CLIENTE