<?php 
require_once '../../../vendor/autoload.php';
use BDM\Models\Banco as Banco;
session_start();

if (isset($_POST['sair'])){
    session_destroy();
}

if(isset($_POST['senha']) && isset($_POST['username'])){
    $call = new Banco();
    $_SESSION['user'] = $call->prepare($_POST['username']);
    $_SESSION['senha'] = sha1($call->prepare($_POST['senha']));
    $call->coletaUser($_SESSION['user'], $_SESSION['senha']);
    if(mysqli_num_rows($data = $call->coletaUser($_SESSION['user'], $_SESSION['senha'])) > 0 ){
        $_SESSION['permissao'] = implode(mysqli_fetch_assoc($call->coletaPerm($_SESSION['user'], $_SESSION['senha'])));
        header("location: ../view/menu.php");
    } else {
        header("location: ../view/login.php");
    }
} else {
    header("location: ../view/login.php");
}
?>