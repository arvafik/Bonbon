<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
//encriptacion
$pass = md5($password); 

// $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
$consulta = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :pass ";
$resultado = $conexion->prepare($consulta);
$resultado->bindParam(':usuario', $usuario);
$resultado->bindParam(':pass', $pass);

$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
    $uid = array_shift($data);
    $_SESSION["s_uid"] = $uid;

}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;


//admin   12345
//demo    demo
//Jess    munchi
//Felipe  password
//Oswaldo hola