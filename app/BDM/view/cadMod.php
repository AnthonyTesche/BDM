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
    <form method="POST" action="../control/controle.php">
        <button type="submit" name="sair" class="btn btn-primary">Sair</button>
    </form>
    <div class="container d-flex justify-content-center mt-5" id="logo">
      <img src="../assets/img/bis2bis-floating.png" height="30%" width="30%">
    </div>
    <div class="container d-flex justify-content-center">
      <form method="POST" action="../control/controleCadMod.php" class="">
        <div class="form-group">
          <label for="username">Modulos</label>
          <input type="text" class="form-control" name="nome" required id="nome" placeholder="Nome do modulo">
        </div>
        <div class="form-group">
          <label for="email">Versao</label>
          <input type="text" class="form-control" name="version" required id="version" placeholder="Versao">
        </div>
        <div class="form-group">
          <label for="email">Descriçao</label>
          <input type="text" class="form-control" name="descricao" required id="descricao" placeholder="Descriçao">
        </div>
        <div class="form-group">
          <label for="email">Categoria</label>
          <input type="text" class="form-control" name="categoria" required id="categoria" placeholder="Categoria">
        </div>
        <div class="form-group">
          <label for="email">Link</label>
          <input type="text" class="form-control" name="link" required id="link" placeholder="Link">
        </div>
        <div class="form-group">
          <label for="email">Composer</label>
          <input type="text" class="form-control" name="composer" required id="composer" placeholder="Composer">
        </div>
        <div class="form-group">
          <label for="email">Git</label>
          <input type="text" class="form-control" name="git" required id="git" placeholder="Git">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Modulo</button>
        </script>
      </form>
    </div>
  </body>
</html>
<?php
    
  } else {
      print "Por favor efetuar login!";
  }


?>