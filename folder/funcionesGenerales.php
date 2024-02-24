<?php
function edadPaciente($fecha_nacimiento){

    $inicio = $fecha_nacimiento;
    $fin = date('Y-m-d');
    $datetime1=new DateTime($inicio);
    $datetime2=new DateTime($fin);

    # obtenemos la diferencia entre las dos fechas
    $interval=$datetime2->diff($datetime1);

    # obtenemos la diferencia en meses
    $intervalMeses=$interval->format("%m");
    # obtenemos la diferencia en años y la multiplicamos por 12 para tener los meses
    $intervalAnos = $interval->format("%y");

   $edad = "";

    if($intervalAnos > 0){
        $edad1 = $intervalAnos;
        if($edad1 > 1){
            if($edad1 <= 110){
                $edad = $intervalAnos." Años";
            }else{
                $edad = "";
            }
        } else{
            $edad = $intervalAnos." Año";
        }
    } else{
        $edad1 = $intervalMeses;
        if($edad1 > 1){
            $edad = $intervalMeses." Meses";
        } elseif($edad1 == 1){
            $edad = $intervalMeses." Mes";
        } else{
            $dias = $interval->format("%d");
            if($dias > 1){
                $edad = $dias." Dias";
            } else{
                $edad = $dias." Dia";
            }

        }
    }
    
    return $edad;
}
?>