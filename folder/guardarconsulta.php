<?php


    $codpaciente = $_POST['codigoPaciente'];
    $motivoConsulta = $_POST['motivo'];
    $examenFisico = $_POST['fisico'];
    $peso = $_POST['pesop'];
    $talla = $_POST['tallap'];
    $saturacion = $_POST['sat'];
    $temperatura = $_POST['tempp'];
    $pulso = $_POST['pulsop'];
    $presion = $_POST['presionp'];
    $fat = $_POST['fat'];
    $diagonisticoPrincipal = $_POST['diagpri'];
    $diagonosticoSecundario = $_POST['diagsec'];
   
    $indicacionesGenerales = $_POST['indic'];
    $certificadoDesde = $_POST['desde'];
    $certificadoHasta = $_POST['hasta'];
    $paraPresentar = $_POST['paraprese'];
    $examenesRequeridos = array();
    $medicamentosRequeridos = array();
    for($i=0; $i < count($_POST['examenes']); $i++){
        $examenesRequeridos[] = array("nombreExamen" => $_POST['examenes'][$i]);
    }
    $examenes = json_encode($examenesRequeridos);

    for($j = 0; $j < count($_POST['prescrip']); $j++){
        $medicamentosRequeridos[] = array("Medicamento" => $_POST['prescrip'][$j]);
    }
    $medicamentos = json_encode($medicamentosRequeridos);


 $query="INSERT INTO consultas (codpaci, motivo_consulta_p, examen_fisico_p, peso_p, altura_p, sat_p, temperatura_p, pulso_p, presion_p, fat_p, diagnostico_princ_p, diagnostico_secun_p, soli_examen_p, ind_generales_p, prescrip_med_p, cert_desde_p, cert_hasta_p, para_presentar_p) VALUES ('$codpaciente', '$motivoConsulta', '$examenFisico', '$peso', '$talla', '$saturacion', '$temperatura', '$pulso', '$presion',  '$fat', '$diagonisticoPrincipal', '$diagonosticoSecundario', '$examenes',  '$indicacionesGenerales', '$medicamentos', '$certificadoDesde', '$certificadoHasta', '$paraPresentar')";

 $db=new PDO('mysql:host=localhost;dbname=proyecto_final',"root","");
 $ejecutar=$db->prepare($query)->execute();

    if($ejecutar){
        $id = $db->lastInsertId();
        echo '<script>alert("Consulta guardada correctamente");
        window.location.replace("verconsultapaciente.php?codConsulta='.$id.'");
        </script>';

        if(isset($_FILES["subirdocumentos"]["name"][0]) && $_FILES["subirdocumentos"]["name"][0] != ""){
            
            $destino = "archivosPacientes";
            for($k = 0; $k < count($_FILES["subirdocumentos"]["name"]); $k++)
            {
               $nombre = $_FILES["subirdocumentos"]["name"][$k];
               $source = $_FILES["subirdocumentos"]["tmp_name"][$k];
               $subir=$db->prepare("INSERT INTO archivos_paciente (codpaci, nombre_archivo) VALUES ('$codpaciente','$nombre')")->execute();
               $target_path = $destino.'/'.$nombre;
               if($subir){
                     move_uploaded_file($source, $target_path);
                  }
            }


        }
            
           
        
    }else{
        echo 'Ha ocurrido un error, intentelo denuevo';
    }
?>