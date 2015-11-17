<?php
        include('../productos/getinfo.php');
        $cerrarcuenta = $mode_top->cerrar_cuenta($idmesa);

        echo "<script> window.location.href = '../mesero/admin.php'	</script>";