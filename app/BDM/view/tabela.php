<?php
session_start();
if (isset($_SESSION['user']) and isset($_SESSION['senha'])){
  if ($_SESSION['permissao'] == 2 || $_SESSION['permissao'] == 3){
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
      <img src="../assets/img/LogoAnthonyTesche.png" height="30%" width="30%">
    </div>
    <div class="container d-flex justify-content-center">
      <form method="POST" action="../control/controleCadMod.php" class="">
        <div class="form-group">
          <label for="username">Novo Campo</label>
          <input type="text" class="form-control" name="campo" required id="campo" placeholder="Nome do campo">
          <select name="tipo">
            <option value="int">Inteiro</option>
            <option value="char">Caracter</option>
            <option value="text">Texto</option>
            <option value="date">Data</option>
          </select>
        </div>
        <input type="checkbox" name="nulo" value="NOT NULL"> Campo Obrigatorio<br>
        <button type="submit" class="btn btn-primary">Adicionar Novo Campo</button>
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