<?php
namespace BDM\Models;

class Cliente{
    private $login;
    private $senha;
    private $email;
    private $permissao;
    private $codUser;

    public function populate($login, $senha, $email, $permissao){
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setEmail($email);
        $this->setPermissao($permissao);
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }

    public function setCodUser($codUser){
        $this->codUser = $codUser;
    }

    public function getPermissao(){
        return $this->permissao;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getCodUser(){
        return $this->codUser;
    }
}
?>