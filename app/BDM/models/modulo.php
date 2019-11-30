<?php 
namespace BDM\Models;
use BDM\Models\Banco as Banco;
require_once '../../../vendor/autoload.php';
class Modulo{     
    private $codigo;
    private $nome;
    private $version;
    private $descricao;
    private $categoria;
    private $link;
    private $composer;
    private $git;

    public function populate($nome, $version, $categoria, $descricao, $composer, $link, $git){
        $this->setNome($nome);
        $this->setVersion($version);
        $this->setCategoria($categoria);
        $this->setDescricao($descricao);
        $this->setComposer($composer);
        $this->setlink($link);
        $this->setGit($git);
    }

    public function populateArray($array){
        $this->setNome($array[0]);
        $this->setVersion($array[1]);
        $this->setDescricao($array[2]);
        $this->setCategoria($array[3]);
        $this->setlink($array[4]);
        $this->setComposer($array[5]);
        $this->setGit($array[6]);
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setNome($nome){ 
        $this->nome = $nome;
    }

    public function setVersion($version){ 
        $this->version = $version;
    }

    public function setDescricao($descricao){ 
        $this->descricao = $descricao;
    }

    public function setCategoria($categoria){ 
        $this->categoria = $categoria;
    }

    public function setlink($link){ 
        $this->link = $link;
    }

    public function setComposer($composer){ 
        $this->composer = $composer;
    }

    public function setGit($git){ 
        $this->git = $git;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getVersion(){
        return $this->version;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function getLink(){
        return $this->link;
    }

    public function getComposer(){
        return $this->composer;
    }

    public function getGit(){
        return $this->git;
    }

    public function pesquisa(){

        if(isset($_POST['pesquisaNome'])){
            $busca = $_POST['pesquisaNome'];
            $b = new Banco;
            $atr = "nome";
            $b->coletaMod($atr, $busca);
        }
        
        if(isset($_POST['pesquisaVersion'])){
            $busca = $_POST['pesquisaNome'];
            $b = new Banco;
            $atr = "version";
            $b->coletaMod($atr, $busca);
        }
        
        if(isset($_POST['pesquisaGit'])){
            $busca = $_POST['pesquisaNome'];
            $b = new Banco;
            $atr = "version";
            $b->coletaMod($atr, $busca);
        }
        
        if(isset($_POST['pesquisaComposer'])){
            $busca = $_POST['pesquisaNome'];
            $b = new Banco;
            $atr = "version";
            $b->coletaMod($atr, $busca);
        }

    }


}
?>