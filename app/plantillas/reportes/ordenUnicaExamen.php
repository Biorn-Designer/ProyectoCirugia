<?php

function getPlantilla($row, $dataEstudio){




$plantilla='<body>
<header class="clearfix">
  <div id="logo">
    <img src="img/login-logo.png">
  </div>
  <div id="company">
    <h2 class="name">Clinica Médica Quirurgica Fenix SpA</h2>
    <div>Cirugia Menor, Medicina y Cirugía Estética</div>
    <div>Cano y Aponte #1004, Providencia, Santiago</div>
    <div><strong>Web: </strong>clinicaesteticafenix.cl, cirugiamenor.cl</div>
    <div><strong>Whatsapp: </strong>+56956320127 <strong>Fono: </strong>+56352295037</div>
    <div><a href="mailto:company@example.com">reservas@cirugiamenor.cl, dr.cuadrado@cirugiamenor.cl</a></div>
  </div>
  </div>
</header>


<main>
    <div id="thanks">Orden de Examen</div>
    <div id="details" class="clearfix">
        <div id="client">
          <div class="address">RUT PACIENTE:' . $row["dnipa"] .'</div>
          <div class="address">NOMBRE PACIENTE:' . $row["nombrep"] . " " . $row["apellidop"] . '</div>
          <div class="address">EDAD PACIENTE:' . $row["dnipa"] .'</div>
        </div>
       
      </div>


  <div id="details" class="clearfix">
    <div id="client">
      <div class="address">EXAMEN SOLICITADO: ' . trim($dataEstudio, " , ")
      .' </div>
    </div>
   
  </div>

   
  </div>

  <div id="details" class="clearfix">
    <div id="client">
    <div class="address">FECHA DE REMISION: ' . date("d/m/Y",strtotime($row["fecha_consulta"])) .'</div>
    </div>
   
  </div>
  


  </main>
<footer>
 Cano y Aponte #1004, Providencia, Santiago
</footer>
</body>';

return $plantilla;

}