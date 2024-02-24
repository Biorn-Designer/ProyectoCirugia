<?php

function getPlantilla($row){




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
    <div><a href="mailto:company@example.com">reservas@cirugiamenor.cl</a></div>
  </div>
  </div>
</header>


<main>
    <div id="thanks">RESERVA DE CONSULTA</div>
    <div id="details" class="clearfix">
        <div id="client">
          <h2 class="name">Comprobante de Reserva de Consulta</h2>
          
          <div class="address">RUT PACIENTE:' . $row["dnipa"] .'</div>
          <div class="address">NOMBRE PACIENTE:' . $row["nombrep"] . " " . $row["apellidop"] . '</div>
        </div>
       
      </div>


  <div id="details" class="clearfix">
    <div id="client">
      <h2 class="name">' . nl2br($row["ind_generales_p"]) .'</h2>
    </div>
   
  </div>

  <div id="details" class="clearfix">
    <div id="client">
      <h2 class="name">' . $row["fecha_consulta"] .'</h2>
    </div>
   
  </div>
  


  </main>
<footer>
 Cano y Aponte #1004, Providencia, Santiago
</footer>
</body>';

return $plantilla;

}