let calendarEl = document.getElementById('calendario');
let calendar = new FullCalendar.Calendar(calendarEl, {

        locale: 'es',
        initialView: 'timeGridDay',
		headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                  },
                 editable: true,
                dateClick:function(info){
                },
                events:'actionCalendar.php',
                eventClick:function(info){
                    window.location.replace("http://localhost/finalCirugia/folder/consultapaciente.php?codpaci="+info.event.extendedProps.idPaciente);

                }
});

//INICIO DE GUARDAR UN NUEVO CLIENTE
$("#formNuevoCliente").submit(function (e) {
        e.preventDefault();
        if ($("#nombre").val() == "") {
            alertify.error("Ingrese un nombre");
            $("#nombre").focus();
            return false;
        }
        if (!$("#nombre").val().match(/^[A-ZÑ'ÜÏ. ()_\-",#]+$/)) {
            alertify.error("Solo se Permiten Letras sin Acentos, Diéresis, comilla simple y un punto en el Nombre");
            return false;
        }

       /* if ($("#nacimiento").val() == "") {
            alertify.error("Ingrese una fecha de nacimiento");
            $("#nacimiento").focus();
            return false;
        }*/

        if ($("#cedula").val() != "" && !$("#cedula").val().match(/^[0-9-]+[A-Z]{1}$/)) {
            alertify.error("Formato Incorrecto en el campo Cédula");
            $("#cedula").focus();
            return false;
        }

        if ($("#pasaporte").val() != "" && $("#pasaporte").val().match(/^[<>]+$/)) {
            alertify.error("Simbolos Invalidos en el Pasaporte");
            $("#pasaporte").focus();
            return false;
        }

        if ($("#telefono").val() != "" && !$("#telefono").val().match(/^[A-Za-z0-9()+ :_\-"',#]+$/)) {
            alertify.error("Solo se Permiten Numeros y Parentesis en el Telefono");
            $("#telefono").focus();
            return false;
        }

        if ($("#celular").val() != "" && !$("#celular").val().match(/^[A-Za-z0-9()+ :_\-'",#]+$/)) {
            alertify.error("Solo se Permiten Numeros y Parentesis en el Celular");
            $("#celular").focus();
            return false;
        }
        if ($("#correo").val() != "" && $("#correo").val().match(/^[<>,'"]+$/)) {
            alertify.error("Simbolos Invalidos en el Correo");
            $("#correo").focus();
            return false;
        }

        if ($("#tokenSeguridad") == "" || !$("#tokenSeguridad").val().match(/^[a-zA-Z0-9]+$/)) {
            alertify.error("Token de Seguridad Inválido - Contacte al Administrador");
            return false;
        }

        if ($("#tokenSession") == "" || !$("#tokenSession").val().match(/^[a-zA-Z0-9]+$/)) {
            alertify.error("Token de Sesión Inválido - Contacte al Administrador");
            return false;
        }

        let tokenSession = $("#tokenSession").val();
        let tokenSeguridad = $("#tokenSeguridad").val();

        let data = $(this).serialize() + "&tokenSeguridad=" + tokenSeguridad + "&tokenSession=" + tokenSession + "&action=" + "crear";
        $.ajax({
            type: "POST",
            url: "php/clientesAction.php",
            data: data,
            dataType: "json",
            beforeSend: function () {
                $("#btnGuardarCliente").attr("disabled", "disabled");
            },
            success: function (data) {
                if (data.respuesta == "true") {
                    alertify.success("Cliente Guardado Con Exito");
                    $("#btnGuardarCliente").removeAttr("disabled", "disabled");
                    $("#formNuevoCliente")[0].reset();

                } else {
                    alertify.error(data.mensaje);
                    $("#btnGuardarCliente").removeAttr("disabled", "disabled");
                }
            }
        })

    });
//FIN DE GUARDAR UN NUEVO CLIENTE
    
// FUNCION PARA CALCULAR FECHA DE NACIMIENTO A PARTIR DE LA EDAD
$(document).on('keyup', '#fecha_nacimiento', function () {
        var edad = $(this).val();
        if (edad != "") {
            year = $("#year").val();
            anio = parseInt(year) - parseInt(edad);
            fec = anio + "-01-01";
            $('#nacimiento').val(fec);
        } else {
            $('#nacimiento').val("");
        }

    });
$(document).on('keyup', '#fecha_nacimiento_meses', function () {
        var meses = $(this).val();
        if (meses != "") {
            fecha = $("#fecha_de_hoy").val();
            intervalo = -meses;
            dma = "m";
            editar_fecha(fecha, intervalo, dma);
        } else {
            $('#nacimiento').val("");
        }

    });


$("#nombreCliente").on("keydown", function (event) {
        if (event.keyCode == $.ui.keyCode.LEFT || event.keyCode == $.ui.keyCode.RIGHT || event.keyCode == $.ui.keyCode.UP || event.keyCode == $.ui.keyCode.DOWN || event.keyCode == $.ui.keyCode.DELETE || event.keyCode == $.ui.keyCode.BACKSPACE) {
            $('#idCliente').val("");
            $('#tokenCliente').val("");

        }
        if (event.keyCode == $.ui.keyCode.DELETE) {
            $('#idCliente').val("");
            $('#nombreCliente').val("");
            $('#tokenCliente').val("");
        }
    });
//FIN DE BUSCAR CLIENTE EN TIEMPO REAL CON JQUERY UI


let nuevoEvento;
function recolectarDatos(){
		nuevoEvento={
		id:$('#idCita').val(),
		idCliente:$('#idCliente').val(),
		title:$('#nombreCliente').val(),
		start:$('#fecha').val()+" "+$('#hora').val(),
        telefonoCliente: $('#telefonoCliente').val(),
        nombreMedico: $('#nombreMedico').val(),
        nombreMedicoReferente: $('#nombreMedicoReferente').val(),
        serviciosRequeridos: $('#serviciosRequeridos').val(),
        observacion: $('#observacion').val(),
        tokenSeguridad: $('#tokenSeguridad').val(),
        tokenSession: $('#tokenSession').val(),
        clinicaUtilizar: $('#clinicaUtilizar').val(),
        idCategoria : $("#idCategoria").val(),
        estadoCita : $("#estadoCita").val()
	}; 
}
$("#agregarcita").click(function(){
    if (isNaN($('#idCliente').val()) == true || $('#idCliente').val() <= 0 ) {
            alertify.error("ID Cliente Inválido - Contacte al administrador");
            return false;
        }
    if ($('#fecha').val() == "" ) {
            alertify.error("INGRESE UNA FECHA");
            return false;
        }
    if ($('#hora').val() == "" ) {
            alertify.error("INGRESE UNA HORA");
            return false;
        }
  if($('#nombreMedico').val() != "" && !$('#nombreMedico').val().match(/^[0-9A-ZÑ'ÜÏ. ()\-,:#]+$/)){
            alertify.error("NOMBRE DEL MEDICO TRATANTE TIENE CARACTERES NO PERMITIDOS");
            $('#nombreMedico').focus();
            return false;
    }
    if($('#nombreMedicoReferente').val() != "" && !$('#nombreMedicoReferente').val().match(/^[0-9A-ZÑ'ÜÏ. ()\-,:#]+$/)){
            alertify.error("NOMBRE DEL MEDICO REFERENTE TIENE CARACTERES NO PERMITIDOS");
            $('#nombreMedicoReferente').focus();
            return false;
    }
	recolectarDatos();
	enviarInformacion('agregar',nuevoEvento);
})
$("#editarcita").click(function(){
	recolectarDatos();
	enviarInformacion('editar',nuevoEvento);
})	
$("#eliminarcita").click(function(){
    alertify.confirm('ELIMINAR CITA', 'DESEA ELIMINAR ESTA CITA ?', function(){ recolectarDatos();
        enviarInformacion('eliminar',nuevoEvento);
    }, function(){ alertify.error('SE CANCELO LA ELIMINACION')}).set('labels', {ok:'ELIMINAR', cancel:'CANCELAR'}); 

	
})	
$(document).ready(function(){

   calendar.render();
    
})

function enviarInformacion(accion,objEvento){
		$.ajax({
			type:'POST',
			url:'php/agendaAction.php?action='+accion,
			data:objEvento,
			success: function(msg){
				if(msg == "true"){
				calendar.refetchEvents();	
                $("#modalCitas").modal('toggle');
				$('#id_cita').val("");
                $('#nombreCliente').val("");
                $('#idCliente').val("");
                $('#nombreUsuario').val("");
				}else if(msg == ""){
                    alertify.error('hubo un error Contacte al Administrador');
                }else{
                    alertify.error(msg);
                }
			},
			error: function(){
				alertify.error('hubo un error');
			}
		})
	}
function agregarServicioAgenda(servicio){
//    $('#area').val($('#area').val()+'foobar');
    alertify.success("Estudio Agregado");
    $("#serviciosRequeridos").val($("#serviciosRequeridos").val() + " , " + servicio);
}
function cerrarModal(modal){
    let modals = $("#modalListaEstudiosAgenda").modal("toggle");
    $("#modalCitas").modal("toggle");
    setTimeout(addClass,600);
}

function modalServicioRequerido(){
    let modals = $("#modalListaEstudiosAgenda").modal("toggle");
    $("#modalCitas").modal("toggle");
    setTimeout(addClass,600);
}
function addClass(){
    $("#body").addClass("modal-open")
}

 //ESTE ES EL FILTRO DE BUSQUEDA PARA LOS ESTUDIOS
$('#buscarEstudioGeneralCita').keyup(function (event) {
    let contenido = new RegExp($(this).val(), 'i');
    $('.source2').hide();
    $('.source2').filter(function () {
        return contenido.test($(this).text());
    }).show();

});
//FIN DEL FILTRO DE BUSQUEDA