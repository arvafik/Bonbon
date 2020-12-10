console.log("mis recetas");

function uploadXML() {
            document.getElementById("file").click();
        }
          var readXml=null;

 $('#file').on('change', function () {
     event.preventDefault();
           var selectedFile = document.getElementById('file').files[0];
           console.log(selectedFile);
           var reader = new FileReader();
           reader.onload = function(e) {
               readXml=e.target.result;
               console.log(readXml);
               var parser = new DOMParser();
               var doc = parser.parseFromString(readXml, "application/xml");
               $('#nombre').val(doc.all[1].innerHTML);
               $('#descripcion').val(doc.all[2].innerHTML);
               $('#dificultad').val(doc.all[3].innerHTML);
               $('#tiempococcion').val(doc.all[4].innerHTML);
               $('#categoria').val(doc.all[5].innerHTML);
           }
           reader.readAsText(selectedFile);
     
});       
        
      
       
       
function generarXML(){
        var xml = '<?xml version="1.0" encoding="UTF-8"?> \n';
        xml += '    <receta> \n';
        xml += '        <nombre>'+$('#nombre').val()+'</nombre> \n';
        xml += '        <descripcion>'+$('#descripcion').val()+'</descripcion> \n';
        xml += '        <dificultad>'+$('#dificultad').val()+'</dificultad> \n';
        xml += '        <tiempococcion>'+$('#tiempococcion').val()+'</tiempococcion> \n';
        xml += '        <categoria>'+$('#categoria').val()+'</categoria> \n';
        xml += '    </receta>'
        download(xml ,'sourceCode', 'xml');
    }

    function download(data, filename, type) {
        var file = new Blob([data], { type: type });
        if (window.navigator.msSaveOrOpenBlob){
            window.navigator.msSaveOrOpenBlob(file, filename);
        }
        else{
            var a = document.createElement("a"), url = URL.createObjectURL(file);
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            setTimeout(function () {
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
            }, 0);
        }
    }
    
    
const toggleSwitch = document.querySelector(
    '.theme-switch input[type="checkbox"]'
  );
  const currentTheme = localStorage.getItem("theme");
  
  if (currentTheme) {
    document.documentElement.setAttribute("data-theme", currentTheme);
  
    if (currentTheme === "dark") {
      toggleSwitch.checked = true;
      console.log("guardado")
    }
  }
  
  function switchTheme(e) {
    if (e.target.checked) {
          document.documentElement.setAttribute("data-theme", "dark");
          localStorage.setItem("theme", "dark");
          console.log("dark");
    } else {
          document.documentElement.setAttribute("data-theme", "light");
          localStorage.setItem("theme", "light");
          console.log("light");
    }
  }
  
  toggleSwitch.addEventListener("change", switchTheme, false);

  $(document).ready(function(){
    tabla = $("#tabla").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<button class='button is-info btnEditar'>Editar</button><button class='button is-danger btnBorrar'>Borrar</button>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $('#btnDescargar').css('display', 'none');
     $('#btnSubir').css('display', 'inherit');
    $("#formRecetas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Receta");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    $('#btnDescargar').css('display', 'inherit');
    $('#btnSubir').css('display', 'none');
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    dificultad = fila.find('td:eq(3)').text();
    tiempococcion = fila.find('td:eq(4)').text();
    categoria = fila.find('td:eq(5)').text();
    
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    $("#dificultad").val(dificultad);
    $("#tiempococcion").val(tiempococcion);
    $("#categoria").val(categoria);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Receta");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar la receta número: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tabla.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formRecetas").submit(function(e){ 
    e.preventDefault();    
    
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val());
    dificultad = $.trim($("#dificultad").val());  
    tiempococcion = $.trim($("#tiempococcion").val());  
    categoria = $.trim($("#categoria").val());  
    usuarioNombre = $.trim($("#usuarioNombre").val());  
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {id:id, nombre:nombre, descripcion:descripcion, dificultad:dificultad, tiempococcion:tiempococcion, categoria:categoria, usuarioNombre:usuarioNombre, opcion:opcion},
        success: function(data){  
            console.log(data);
            console.log(data[0].RecetaID);
            id = data[0].RecetaID;            
            nombre = data[0].Nombre;
            descripcion = data[0].Descripcion;
            dificultad = data[0].Dificultad;
            tiempococcion = data[0].TiempoCoccion;
            categoria = data[0].Categoria;
            usuarioNombre = data[0].UsuarioNombre;
            console.log(data);
            //tabla.row.add([id,nombre,descripcion,dificultad,tiempococcion,categoria]).draw();
            if(opcion == 1){
                tabla.row.add([id,nombre,descripcion,dificultad,tiempococcion,categoria]).draw();
            }
            else{
                tabla.row(fila).data([id,nombre,descripcion,dificultad,tiempococcion,categoria]).draw();
            }            
        }        
    });
    $("#modalCRUD").modal("hide"); 
    
});    
    
});