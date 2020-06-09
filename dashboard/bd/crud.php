<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   


$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$dificultad = (isset($_POST['dificultad'])) ? $_POST['dificultad'] : '';
$tiempococcion = (isset($_POST['tiempococcion'])) ? $_POST['tiempococcion'] : '';
$categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO recetas (Descripcion, Dificultad, TiempoCoccion, Nombre, Categoria) VALUES ('$descripcion','$dificultad','$tiempococcion','$nombre','$categoria')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT RecetaID, Nombre, Descripcion, Dificultad, TiempoCoccion, Categoria FROM recetas ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE recetas SET nombre='$nombre', descripcion='$descripcion', dificultad='$dificultad', tiempococcion='$tiempococcion', categoria='$categoria' WHERE RecetaID='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT RecetaID, Nombre, Descripcion, Dificultad, TiempoCoccion, Categoria FROM recetas WHERE RecetaID='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM recetas WHERE RecetaID='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
