<?php
include_once("../estructura/Cabecera.php");
$metodo = data_submitted();
$objUsuario = new c_usuario();
$datosUsuario = $objUsuario->buscar($metodo);
?>
<div class="container-fluid">
    <div class="container col-md-5 text-white">
        <?php
        if ($datosUsuario != null) {
        ?>
            <form action="actualizarDatosPersona.php" method="get" class="needs-validation" novalidate>
                <div>
                    <label class="mt-3">ID: </label><input type="text" name="idusuario" id="idusuario" class="form-control" value="<?php echo $datosPersona[0]->getId() ?>" disabled>
                    <div class="d-none">
                        <input type="text" name="usnombre" id="usnombre" class="form-control" value="<?php echo $datosPersona[0]->getId() ?>">
                    </div>
                </div>
                <div>
                    <label class="mt-3">Nombre: </label><input type="text" name="Nombre" id="Nombre" class="form-control" required value="<?php echo $datosPersona[0]->getNombre() ?>" pattern="[a-zA-Z]+\s?[a-zA-Z]*\s?[a-zA-Z]*\s?[a-zA-Z]*\s?[a-zA-Z]*">
                    <div class="invalid-feedback">
                        Porfavor ingrese un nombre valido!
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
                </div>
                <div>
                    <label class="mt-3">Contraseña: </label><input type="password" name="uspass" id="uspass" class="form-control" required value="<?php echo $datosPersona[0]->getPass() ?>">
                    <div class="invalid-feedback">
                        Porfavor ingrese una contraseña!
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
                </div>
                <div>
                    <label class="mt-3">Email: </label><input type="text" name="usmail" id="usmail" class="form-control" required value="<?php echo $datosPersona[0]->getMail() ?>" pattern="[^@\s]+@[^@\s]+\.[^@\s]+">
                    <div class="invalid-feedback">
                        Porfavor ingrese un email valido! expample@info.com
                    </div>
                    <div class="valid-feedback">
                        Correcto!
                    </div>
                </div>
                <div class="mt-2">
                    <a href="buscarPersona.php" class="btn btn-dark">Volver</a>
                    <button type="submit" class="btn btn-dark">Modificar</button>
                </div>
            </form>
        <?php
        } else {
            echo ' <p class="lead text-danger">La persona ingresada no existe en la base de datos!</p>';
            echo '<a href="buscarPersona.php" class="btn btn-dark">Volver</a>';
        }
        ?>

    </div>
</div>
<script src="../js/validarCamposVacios.js"></script>

<?php
include_once("../estructura/Pie.php");
?>