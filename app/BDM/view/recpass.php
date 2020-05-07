<?php
use BDM\Models\Banco as Banco;
require_once '../../../vendor/autoload.php';
session_start();

if( !empty($_POST) ){
    $ba = new Banco();
    $ba->recPass();
} else {
?>
<!DOCTYPE html>
<html lang="en"> <!-- Form do Bootstrap com algumas alteracoes -->
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../assets/css/geral.css">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center mt-5" id="logo">
      <img src="../assets/img/LogoAnthonyTesche.png" height="30%" width="30%">
    </div>
    <div class="container d-flex justify-content-center">
      <form method="POST">
        <div class="form-group">
          <label for="username">Email</label>
          <input type="text" class="form-control" name="email" required id="email" placeholder="Email"><br>
          <button type="submit" class="btn btn-primary">Recuperar</button>
        </div>
      </form>
    </div>
  </body>
</html>
<?php
  }
?>