<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->

<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT RecetaID, Nombre, Descripcion, Dificultad, TiempoCoccion, Categoria FROM recetas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="cont-index">
    <div class="container">
        <h1 class="title is-1">¿Qué vamos a cocinar hoy, <?php echo $_SESSION["s_usuario"]; ?>?</h1>
        <button id="btnNuevo" class="button is-warning" type="button" data-toggle="modal">Añadir receta</button>
    </div>
    <br>

    <div class="container">
        <table id="tabla" class="table is-hoverable is-striped" style="width:100%">
            <thead class="text-center">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Dificultad</th>
                    <th>Tiempo de cocción</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $dat) {
                ?>
                    <tr>
                        <td><?php echo $dat['RecetaID'] ?></td>
                        <td><?php echo $dat['Nombre'] ?></td>
                        <td><?php echo $dat['Descripcion'] ?></td>
                        <td><?php echo $dat['Dificultad'] ?></td>
                        <td><?php echo $dat['TiempoCoccion'] ?></td>
                        <td><?php echo $dat['Categoria'] ?></td>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>

    <div class="modal" id="modalCRUD">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title modal-title"></p>
                <button class="delete close" data-dismiss="modal" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <form id="formRecetas">
                    <label>Nombre:</label>
                    <input id="nombre" class="input" type="text" placeholder="Escribe aquí el nombre">
                    <label>Descripción:</label>
                    <input id="descripcion" class="input" type="text" placeholder="Escribe aquí los pasos">
                    <label>Dificultad:</label>
                    <input id="dificultad" class="input" type="text" placeholder="Escribe aquí la dificultad">
                    <br>
                    <label>Tiempo de cocción:</label>
                    <input id="tiempococcion" class="input" type="text" placeholder="Escribe aquí el tiempo de cocción">
                    <label>Categoría:</label>
                    <input id="categoria" class="input" type="text" placeholder="Escribe aquí la categoría">
            </section>
            <footer class="modal-card-foot">
                <button type="button" class="button is-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="button is-success">Guardar</button>
            </footer>
            </form>
        </div>
    </div>

</div>
</div>
</div>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>