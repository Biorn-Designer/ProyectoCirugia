<?php require_once('../../view/config/conex.php'); 

 //INICIO LISTAR CLIENTE 
 if(isset($_GET['term']) && $_GET['term']!=""){
            
  $query_listar = mysqli_query($conex, "SELECT * FROM diagnosticos WHERE estado_diagnostico = 1 AND diagnostico LIKE '%" .$_GET['term']."%' LIMIT 0 ,50"); 
  $data = array();
  while($row = mysqli_fetch_assoc($query_listar)){
      
      $data_row= array(
          "value" => $row['diagnostico'],
          "diagnostico" => $row['diagnostico']
          
       );
      
      $data[] = $data_row;
  }
  echo json_encode($data);

}
//FIN LISTAR CLIENTE