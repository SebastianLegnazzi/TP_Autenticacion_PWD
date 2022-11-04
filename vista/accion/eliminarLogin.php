<?php
include_once("../estructura/Cabecera.php");
$datos = data_submitted();
$objUsuario = new c_usuario();
?>
<div class="container-fluid">
    <div class="container col-md-10 text-white">
        <h2>Resultado:</h2>
        <div class="mb-3">
            <?php
            if ($objUsuario->baja($datos)) {
            ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'El usuario se elimino correctamente!',
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
                        title: 'El usuario no se ha podido eliminar!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    function redireccionarPagina() {
                        location.href = "../modUsuarios/listarUsuario.php"
                    }
                    setTimeout("redireccionarPagina()", 1450);
                </script>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
include_once("../estructura/Pie.php");
?>