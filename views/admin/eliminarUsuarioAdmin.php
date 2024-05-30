<?php
require_once '../../data/conexion.php'; 
require_once '../../model/Usuario.php';
require_once '../../data/DAOUsuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $daoUsuario = new DAOUsuario();
    if ($daoUsuario->eliminar($id)) {
        header("Location: usuariosAdmin.php?mensaje=Usuario eliminado");
    } else {
        header("Location: usuariosAdmin.php?mensaje=Error al eliminar usuario");
    }
}
?>



