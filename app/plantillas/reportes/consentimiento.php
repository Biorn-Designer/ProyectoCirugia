<?php

function getPlantilla($row) {

$plantilla= '<body>
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
      <div id="details" class="">
        <div id="client">
          <div class="to">CONCENTIMIENTO INFORMADO:</div>
          <h2 class="name">' . $row["nombrep"] . " " . $row["apellidop"] . '</h2>
          <div class="address">Rut:' . $row["dnipa"] .'</div>
          <div class="email">Dirección:' . $row["direccion"] .'</div>
          <div><br /><br /><br /></div>
        </div>
        <div>IMPORTANTE¡¡¡ Lea esta información de forma cuidadosa y completa.
          El presente documento constituye un consentimiento informado, el cual ofrece al paciente un detalle pormenorizado de las características del procedimiento al que se someterá voluntariamente, sus eventuales riesgos y contraindicaciones, y las necesidades post tratamiento aconsejadas por el profesional tratante. El registro del Rut y numero de documento del paciente en la ficha clínica, implica conocer y aceptar dicha información, y asumir los eventuales riesgos propios del procedimiento, con absoluta comprensión de sus alcances.
          La medicina y la cirugía es una ciencia altamente probabilística, no es una ciencia exacta, y aunque se esperen buenos resultados, no hay garantía explícita sobre los eventuales riesgos que toda acción médica sobre el cuerpo pueda generar, cumpliendo el profesional su obligación de utilizar todos los medios posibles para alcanzar el mejor resultado dentro de las particularidades de cada paciente. Por tanto, cumpliendo con las disposiciones de la Ley 20.584 que regula los derechos y deberes que tiene cada persona en relación con las acciones vinculadas a atenciones de salud, en sus artículos 10mo y 14vo, estipula la obligación del consentimiento informado, el cual, este establecimiento pone a disposición del paciente la siguiente información: 
          Generalidades: los procedimientos que se realizan en este establecimiento se hacen bajo los efectos de la anestesia local, la cual esta asociada con otros productos químicos que sirven para darle analgesia y bienestar durante el procedimiento, se trabaja con materiales esterilizados en empresa externa Paraclinics. Garantizando y previniendo todo tipo de infección intraoperatoria. Al ser anestesia local, el paciente esta todo tiempo consciente activo y colaborador, adoptando las posturas físicas que sean requeridas para ejecutar su procedimiento, la duración de la anestesia, usualmente, no es mayor a 1 hora y en proceso complejos como liposucción, pueden durar hasta tres días. Si el paciente lo requiere, puede acudir al baño durante su procedimiento, en el momento que lo autorice el profesional que lo asiste. Durante su intervención el personal le irá reiterando las instrucciones post quirúrgicas entregadas, en cuanto a: cuidados de la herida, el tratamiento a tomar, los cuidados específicos que debe de tener cuando este en domicilio, restricción alimentaria. Una vez finalizado el procedimiento, el paciente puede retirarse del establecimiento cuando el profesional lo autorice, debe recordar que tiene que revisar el documento, que destaca: hora de control, curaciones, citaciones, derivaciones y tratamiento farmacológico. Puede acudir espontaneo dentro de los horarios de atención establecidos, generados por su procedimiento. Toda duda o inquietud, debe consultar de manera directa con el profesional o a través de los medios establecidos. Las heridas deben de mantenerse ventiladas una vez que sean retirados los parches, debe usar los dispositivos que se le han indicado, durante el tiempo establecido. Debe acudir de manera puntual a sus controles, para optimizar sus resultados, cualquier proceso desfavorable estará a tiempo de estar resuelto, si usted cumple con estas disposiciones.
          Riesgos frecuentes: por desconocimiento del paciente reacción alérgica a los anestésicos y analgésicos, reacción paradojal, lipotimia(desmayo), baja tolerancia al dolor, temor e inseguridad, crisis de pánico ante el procedimiento; al trabajar con anestesia local, no se esperan complicaciones que terminen con riesgo vital, los procedimientos son de corta duración y por lo general concluyen sin complicaciones. Las incisiones solo abarcan piel y tejido graso, no se interviene tejido muscular ni se accede a cavidades tales como: tórax, abdomen o cráneo; la mayoría de las incisiones no requieren de puntos, salvo aquellas mayores de 0,5 cm. Y las heridas de piel extensas.
          Lesiones frecuentes: toda intervención sobre piel y tejido graso, va a presentar: edema, equimosis y hematoma, que, con el tratamiento y reposo adecuado, suelen resolverse en pocos días. El dolor se presenta después del efecto de la anestesia, el cual, se atenúa con los analgésicos y se resuelve a medida que cicatriza su herida. En procesos extensos como liposucción, es muy común drenar liquido serohemático por varios días, mientras se somete a los tratamientos y drenajes respectivos. De manera general la limitación física en cirugías menores, se limita a uno o dos días y en cirugías extensas de siete a once días, por lo que, según su actividad u ocupación requerirá del reposo respectivo para su optima recuperación.    
          CONSENTIMIENTO PARA CIRUGIA, PROCEDIMIENTO O TRATAMIENTO
          <div><p>1.- Por el presente instrumento, autorizo a los profesionales de este establecimiento a realizar el procedimiento/ tratamiento antes solicitado, declarando que estoy informado de los eventuales riesgos que implica, firmando voluntariamente dicho consentimiento previo a la intervención programada.</p></div>
          <div><p>2.- Doy fé de no haber omitido y/o alterado información y/o datos al exponer mi historial y/o antecedentes clínicos/ quirúrgicos, asumiendo toda responsabilidad que derive de la ocultación de ésta información, que pueda desencadenar efectos y/o resultados adversos no deseados/esperados durante y después del servicio solicitado.</p></div>
          <div><p>3.- Autorizo a éste establecimiento a dejar registro fotográfico de mi intervención médica, y guardar dicha información con la finalidad de mantener registro de mi ficha clínica. Se deja explicito que no se difundirá su contenido sin autorización expresa de mi parte.</p></div>
          <div><p>4.- Manifiesto pleno consentimiento y aceptación de los términos de este documento, y queda explicito de que el equipo médico de esta clínica se compromete a alcanzar el mejor resultado posible, empleando las técnicas médicas habituales y establecidas, hasta el alta médica respectiva, así mismo, debo cumplir a cabalidad con todas las instrucciones e indicaciones postquirúrgicas/ procedimientos.</p></div>
          <div><p>5.- Se deja explicitado que este procedimiento solicitado puede ser suspendido por cualquiera de las partes, antes y durante su ejecución, asumiendo lo siguiente: por parte del paciente: cubrir los costos que implico su cupo de procedimiento (pabellón, materiales, insumos y el equipo de profesionales convocados en esa fecha) a costo de 3,5 UF (cirugías menores a 1 millón), 5 UF (cirugías mayores a 1 millón), por parte de la Clínica, la devolución del costo de la cirugía, descontado los honorarios y los elementos no propios del establecimiento (ejemplo Prótesis, etc).</p></div>
          <div><p>6.- Los profesionales asumen el deber de atender al paciente hasta el Alta Médica, sin que ello implique más gastos, salvo excepciones puntuales como el pago de insumos médicos en tratamientos adicionales al procedimiento solicitado, o el derecho de pabellón que cubra los materiales ante una reintervención o retoque, según sea el caso, con fines de maximizar sus resultados.</p></div>
          <div><p>7.- Tengo claro de que no existe garantía en cuanto al resultado que se pueda obtener, por cuanto existen condicionantes personales, biológicas, anatómicas, funcionales y externas que influyen en mi resultado final, no obstante, existirá siempre la pre disposición y asistencia de los profesionales de esta clínica de seguir asesorándome para obtener los mejores resultados posibles, por lo que, se tomarán las acciones legales pertinentes ante cualquier difamación o situación infundada en las redes sociales y demás medios de comunicación que afecte al nombre de la Clínica.</p></div>
          <div><p> 8.- Entiendo que este consentimiento puede ser revocado por mí en cualquier momento antes de la realización del procedimiento, asumiendo lo estipulado en el punto 5 de este documento, aunque ya exista firma de autorización al procedimiento., por lo cual actúo bajo mi derecho de desistir.</p></div>
          
          
      
          
          
          
         
          </div>
    </main>
    <footer>
      Cano y Aponte #1004, Providencia, Santiago
    </footer>
  </body>
</html>';


return $plantilla; 

}