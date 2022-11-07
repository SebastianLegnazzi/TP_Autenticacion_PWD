<?php
include_once("../estructura/Cabecera.php");
$metodo = data_submitted();
$objUsuario = new c_usuario();
if($objSesion->validar($metodo["usnombre"], md5($metodo["uspass"]))){
    ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'La sesion se inicio correcptamente!',
            showConfirmButton: false,
            timer: 1500
        })

        function redireccionarPagina() {
            location.href = "../sesion/paginaSegura.php"
        }
        setTimeout("redireccionarPagina()", 1450);
    </script>
    <?php
}else{
    ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'La contraseña y/o el usuario no coinciden!',
            showConfirmButton: false,
            timer: 1500
        })

        function redireccionarPagina() {
            location.href = "../sesion/login.php"
        }
        setTimeout("redireccionarPagina()", 1450);
    </script>
<?php
    $objSesion->cerrar();
}
?>