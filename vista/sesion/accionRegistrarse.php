<?php
include_once("../estructura/Cabecera.php");
$metodo = data_submitted();
$objUsuario = new c_usuario();
if ($objUsuario->alta($metodo)) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'La cuenta se creo correctamente!',
            showConfirmButton: false,
            timer: 1500
        })

        function redireccionarPagina() {
            location.href = "../modUsuarios/listarUsuario.php"
        }
        setTimeout("redireccionarPagina()", 1450);
    </script>
<?php
} else {
?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'La cuenta no se pudo crear en la base de datos!',
            showConfirmButton: false,
            timer: 1500
        })

        function redireccionarPagina() {
            location.href = "registrarse.php"
        }
        setTimeout("redireccionarPagina()", 1450);
    </script>
<?php
}
include_once("../estructura/Pie.php")
?>