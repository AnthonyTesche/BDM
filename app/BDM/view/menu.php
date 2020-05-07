<?php
use BDM\Models\Banco as Banco;
require_once '../../../vendor/autoload.php';
session_start();
if (isset($_SESSION['user']) and isset($_SESSION['senha'])){
    if(isset($_POST['buscas'])){
        $procurando = 1;
        $show = new Banco();
        $atr = $_POST['buscas'];
        $busca = $_POST['pesquisa'];
        if (isset($_POST['buscas2'])){
            $atr2 = $_POST['buscas2'];
            $busca2 = $_POST['pesquisa2'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/scriptGeral.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
</head>
<body>
    <form method="POST" action="../control/controle.php">
        <button type="submit" name="sair" class="btn btn-primary">Sair</button>
    </form>
    <div class="container d-flex justify-content-center mt-5" id="logo">
      <img src="../assets/img/LogoAnthonyTesche.png" height="10%" width="10%">
    </div>
    <div class="container d-flex justify-content-center mt-5">
        <form method="POST" action="../view/menu.php" class="">
            <div class="form-group">
            <label for="consulta">Consulta</label>
            <select name="buscas">
              <option value="nome">Nome</option>
              <option value="version">Version</option>
              <option value="composer">Composer</option>
              <option value="git">Git</option>
              <option value="codigo">Codigo</option>
            </select>
            <input type="text" class="form-control" name="pesquisa" aria-describedby="searchNome" placeholder="Pesquisa"><br>
            </div>
            <label for="consulta">Consulta</label>
            <select name="buscas2">
                <option value="version">Version</option>
              <option value="nome">Nome</option>
              <option value="composer">Composer</option>
              <option value="git">Git</option>
              <option value="codigo">Codigo</option>
            </select>
            <input type="text" class="form-control" name="pesquisa2" aria-describedby="searchNome" placeholder="Pesquisa"><br>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
        <div class="ml-5">
            <div>
                <form method="POST" action="../view/cadMod.php">
                    <button class="btn btn-primary" name="adicionar" aria-describedby="aviso">Adicionar Modulo</button>
                    <?php
                    if($_SESSION['permissao'] == 3){
                        print "<small id=".'aviso'." class=".'form-text text-muted'."> Permissao Insuficiente! </small>";
                    }
                    ?>
                </form>
            </div>
            <div>
                <form method="POST" action="../view/importMod.php">
                    <button class="btn btn-primary mt-3" name="csv" aria-describedby="aviso2">Adicionar .CSV</button>
                    <?php if($_SESSION['permissao'] == 3){
                        print "<small id=".'aviso2'." class=".'form-text text-muted'."> Permissao Insuficiente! </small>";
                    }
                    ?>
                </form>
                <form method="POST" action="../control/controleCadMod.php">
                    <button class="btn btn-primary mt-3" name="export" aria-describedby="aviso6">Exportar .CSV</button>
                    <?php if($_SESSION['permissao'] == 3){
                        print "<small id=".'aviso6'." class=".'form-text text-muted'."> Permissao Insuficiente! </small>";
                    }
                    ?>
                </form>
                <form method="POST" action="../view/tabela.php">
                    <button class="btn btn-primary mt-3" name="csv" aria-describedby="aviso3">Novo Campo para Modulos</button>
                    <?php if($_SESSION['permissao'] == 3 || $_SESSION['permissao'] == 2){
                        print "<small id=".'aviso3'." class=".'form-text text-muted'."> Permissao Insuficiente! </small>";
                    }
                    ?>
                </form>
                <form method="POST" action="../view/alteracao.php">
                    <button class="btn btn-primary mt-3" name="csv" aria-describedby="aviso4">Alteraçao de Modulo</button>
                    <?php if($_SESSION['permissao'] == 3){
                        print "<small id=".'aviso4'." class=".'form-text text-muted'."> Permissao Insuficiente! </small>";
                    }
                    ?>
                </form>
                <form method="POST" action="../view/cadClient.php">
                    <button type="submit" class="btn btn-primary mt-3" id="btn-cadastro" aria-describedby="aviso5">Cadastrar</button>
                    <?php
                    if($_SESSION['permissao'] != 1){
                        print "<small id=".'aviso5'." class=".'form-text text-muted'."> Permissao Insuficiente! </small>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div><br>
    <div>
    <?php 
        if (@$procurando == 1){
                print "
            <div class=".'card'.">
                <div class="."card-body".">
                    <table class=".'table table-bordered'.">
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Versao</th>
                            <th>Descriçao</th>
                            <th>Categoria</th>
                            <th>Link</th>
                            <th>Composer</th>
                            <th>Git</th>
                        </tr>
                    <tr>";         
            $show->coletaModNome($atr, $atr2, $busca, $busca2);
        }
    ?>
                    </tr>
                </table>
            </div>
          </div>
    </div>

</body>
</html>
<?php

    } else {
        print "Por favor efetuar login!";
    }

?>