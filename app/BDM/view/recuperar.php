<?php
use BDM\Models\Banco as Banco;
require_once '../../../vendor/autoload.php';

  if(isset($_POST['pass']) and isset($_POST['passConfirm'])){
    $senha = sha1($_POST['pass']);
    $confirm = sha1($_POST['passConfirm']);
    $email = $_POST['email'];
    if ($senha == $confirm){
      $b = new Banco();
      $b->updateInfo($senha, $email);
      print("Senha alterada com sucesso!");
    }
  } else {
    $b = new Banco();
    $q = $b->limpezaRec();
    if(mysqli_num_rows($q) == "1" ){
  ?>
    <!DOCTYPE html>
    <html lang="en"> <!-- Form do Bootstrap com algumas alteracoes -->
      <head>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" type="text/css" href="../assets/css/geral.css">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          <title>Troca de Senha</title>
      </head>
      <body>
        <div class="container d-flex justify-content-center mt-5" id="logo">
          <img src="../assets/img/bis2bis-floating.png" height="30%" width="30%">
        </div>
        <div class="container d-flex justify-content-center">
          <form method="POST" action="recuperar.php">
            <div class="form-group">
            <label for="NewPass">Email</label>
              <input type="email" class="form-control" name="email" required id="email" placeholder="Email"><br>
              <label for="NewPass">Nova Senha</label>
              <input type="password" class="form-control" name="pass" required id="senha" placeholder="Nova Senha"><br>
              <input type="password" class="form-control" name="passConfirm" required id="senha" placeholder="Confirmaçao de Senha"><br>
              <button type="submit" class="btn btn-primary">Recuperar</button>
            </div>
          </form>
        </div>
      </body>
    </html>

<?php 
    } else {
      echo '<p>Não é possível alterar a password: dados incorretos</p>';
  
    }
  }
?>