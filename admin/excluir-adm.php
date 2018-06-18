<?php 
    $id = $_GET['id'];
    require_once "../config/Administrador.php";
    $administrador = new Administrador();
    $administrador->setId($id);
    $administrador->excluirAdm();
    header("location:cadastro-adm.php");