<?php 
    $id = $_GET['id'];
    require_once "../config/Evento.php";
    $evento = new Evento();
    $evento->setId($id);
    $evento->excluirEvento();
    header("location:cadastro-evento.php");