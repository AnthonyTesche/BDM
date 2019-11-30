<?php
session_start();
if (isset($_SESSION['user']) and isset($_SESSION['senha'])){
  if ($_SESSION['permissao'] == 3){
    header("location: ../view/menu.php");
  }
?>
<!DOCTYPE html>
<html lang="en"> <!-- Form do Bootstrap com algumas alteracoes -->
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="//cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>
      <link rel="stylesheet" type="text/css" href="../assets/css/geral.css">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Cadastro de modulos</title>
  </head>
  <body>
    <form method="POST" action="../control/controleCadMod.php">
        <button type="submit" name="sair" class="btn btn-primary">Sair</button>
    </form>
    <div class="container d-flex justify-content-center mt-5" id="logo">
      <img src="../assets/img/bis2bis-floating.png" height="30%" width="30%">
    </div>
    <div class="container d-flex justify-content-center">
      <form method="POST" action="../control/controleCadMod.php" class="">
      <label for="consulta">Alterar</label>
            <select name="atr">
              <option value="version">Version</option>
              <option value="nome">Nome</option>
              <option value="composer">Composer</option>
              <option value="git">Git</option>
              <option value="descricao">Descriçao</option>
              <option value="categoria">Categoria</option>
              <option value="link">Link</option>
            </select>
            <div class="form-group">
                <input type="text" class="form-control" name="alt" required id="alt" placeholder="Alteraçao">
            </div>
            <label for="Modulo">Codigo do Modulo</label>
            <div class="form-group">
                <input type="text" class="form-control" name="codigo" required id="codigo" placeholder="Codigo do Modulo">
            </div>
        <button type="submit" class="btn btn-primary" name="alteracao">Alterar Modulo</button>
      </form>
    </div>
  </body>
</html>
<?php
    
  } else {
      print "Por favor efetuar login!";
  }


?>