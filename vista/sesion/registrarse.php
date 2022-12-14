<?php
include_once("../estructura/Cabecera.php");
?>
<script src="../js/validarContraseñaIguales.js"></script>
<div class="container-fluid">
    <div class="container col-md-5 text-white">
        <form action="../accion/accionRegistrarse.php" method="get" class="needs-validation row-md-4 mb-4" novalidate>
            <div>
                <label>Nombre: </label><input type="text" pattern="[a-zA-Z]+\s?[a-zA-Z]*\s?[a-zA-Z]*\s?[a-zA-Z]*\s?[a-zA-Z]*" name="usnombre" minlength="3" id="input_nombre" class="form-control text" required>
                <div class="invalid-feedback">
                    Porfavor ingrese un nombre valido! No se aceptan numeros y tiene que ser mayor a 3 letras.
                </div>
                <div class="valid-feedback">
                    Correcto!
                </div>
            </div>
            <div>
                <label>Email: </label><input type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="usmail" minlength="3" id="usmail" class="form-control text" required>
                <div class="invalid-feedback">
                    Porfavor ingrese un email valido! expample@info.com
                </div>
                <div class="valid-feedback">
                    Correcto!
                </div>
            </div>
            <div>
                <label>Contraseña: </label><input type="password" name="uspass" id="input_contraseña" class="form-control" required>
                <div class="invalid-feedback">
                    Ingrese una contraseña!
                </div>
                <div class="invalid-password" style="display: none;">
                    Las contraseñas no coinciden
                </div>
                <div class="valid-feedback password-correcta">
                    Correcto!
                </div>
            </div>
            <div>
                <label>Repetir la Contraseña: </label><input type="password" name="contraseñaRep" id="input_contraseñaRep" class="form-control" required>
                <div class="invalid-feedback">
                    Ingrese una contraseña!
                </div>
                <div class="invalid-password" style="display: none; color: red;">
                    Las contraseñas no coinciden
                </div>
                <div class="valid-feedback password-correcta">
                    Correcto!
                </div>
            </div>
            <input type="submit" name="boton_enviar" onclick="return verificarContraseñaIgual(document.getElementById('input_contraseña'), document.getElementById('input_contraseñaRep'))" class="btn btn-dark mt-2" id="boton_enviar" value="Cargar">
        </form>
        <a href="login.php" class="link-info">ya tengo cuenta</a>
    </div>
</div>
<script src="../js/validarCamposVacios.js"></script>
<?php
include_once("../estructura/Pie.php")
?>