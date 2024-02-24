<?php

      $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
      $consulta="SELECT * FROM customers where codpaci=".$_GET['codpaci'];
      $resultado=$db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $customers[]=$tabla;
      }
      echo json_encode($customers);
    
 ?>
