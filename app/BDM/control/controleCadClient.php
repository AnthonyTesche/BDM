<?php
use BDM\Models\Banco;
use BDM\Models\Cliente as Cliente;
require_once '../../../vendor/autoload.php';

if(isset($_POST['pass']) and isset($_POST['conPass'])){
    if ($_POST['pass'] = $call->prepare($_POST['conPass'])){
        $password = sha1($call->prepare($_POST['pass']));
        if (isset($_POST['username']) and isset($_POST['email'])){
            $login = $call->prepare($_POST['username']);
            $email = $call->prepare($_POST['email']);
            $c = new Cliente();
            if(!isset($_POST['permission'])){
                $permissao = 3;
                $c->populate($login, $password, $email, $permissao);
                $b = new Banco();
                $b->insercaoUser($c);
                header("location: ../view/login.php");
            } else {
                $permissao = $call->prepare($_POST['permission']);
                $c->populate($login, $password, $email, $permissao);
                $b = new Banco();
                $b->insercaoUser($c);
                header("location: ../view/login.php");
            }
        }else {
            echo "Inserir informaçoes nos campos OBRIGATORIOS (Todos)";
        }
    }else {
        echo "Senhas nao conferem! Tente novamente";
    }
} else {
    echo "Inserir informaçoes nos campos OBRIGATORIOS (Todos)";
}
?>