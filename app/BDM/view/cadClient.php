<?php
session_start();
if (isset($_SESSION['user']) and isset($_SESSION['senha'])){
  if ($_SESSION['permissao'] != 1){
    header("location: ../view/menu.php");
  }
?>
<!DOCTYPE html>
<html lang="en"> <!-- Form do Bootstrap com algumas alteracoes -->
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="../assets/css/geral.css">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Cadastro</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center mt-5" id="logo">
      <img src="../assets/img/LogoAnthonyTesche.png" height="30%" width="30%">
    </div>
    <div class="container d-flex justify-content-center">
      <form method="POST" action="../control/controleCadClient.php" class="">
        <div class="form-group">
          <label for="username">User</label>
          <input type="text" class="form-control" name="username" required id="username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="username">Nivel de Permissao</label>
          <input type="text" class="form-control" name="permission" aria-describedby="permHelp" placeholder="Permissao">
          <small id="permHelp" class="form-text text-muted">1 - Total / 2 - Ediçao / 3 - Visualizaçao</small>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" required id="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="pass">Password</label>
          <input type="password" class="form-control" name="pass" required id="pass" aria-describedby="pass" placeholder="Password"><br>
          <input type="password" class="form-control" name="conPass" required id="conPass" aria-describedby="passHelp" placeholder="Confirm Password">
          <small id="passHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
          <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
    </div>
  </body>
  <footer>

  </footer>
</html>
<?php
  } else {
    print "Por favor efetuar login!";
}
?>