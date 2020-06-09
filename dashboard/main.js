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
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {id:id, nombre:nombre, descripcion:descripcion, dificultad:dificultad, tiempococcion:tiempococcion, categoria:categoria, opcion:opcion},
        success: function(data){  
            console.log(data);
            console.log(data[0].RecetaID);
            id = data[0].RecetaID;            
            

            nombre = data[0].Nombre;
            descripcion = data[0].Descripcion;
            dificultad = data[0].Dificultad;
            tiempococcion = data[0].TiempoCoccion;
            categoria = data[0].Categoria;
            tabla.row.add([id,nombre,descripcion,dificultad,tiempococcion,categoria]).draw();
            if(opcion == 1){
               
            }
            else{
                tabla.row(fila).data([id,nombre,descripcion,dificultad,tiempococcion,categoria]).draw();
            }         
        }        
    });
    $("#modalCRUD").modal("hide"); 
    
});    
    
});