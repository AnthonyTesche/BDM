<!DOCTYPE html>
<html lang="en"> <!-- Form do Bootstrap com algumas alteracoes -->
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="../assets/js/scriptGeral.js"></script>
      <link rel="stylesheet" type="text/css" href="../assets/css/geral.css">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Login</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center mt-5" id="logo">
      <img src="../assets/img/bis2bis-floating.png" height="30%" width="30%">
    </div>
    <div class="container d-flex justify-content-center">
      <form method="POST" action="../control/controle.php" class="">
        <div class="form-group">
          <label for="username">User</label>
          <input type="text" class="form-control" name="username" required id="username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="senha" required id="senha" aria-describedby="Senha" placeholder="Senha">
          <small id="Senha" class="form-text text-muted">We'll never share your data with anyone else.</small>
        </div>
        <div class="container d-flex justify-content-center">
          <button type="submit" class="btn btn-primary w-95 mr-2">Login</button>
        </div>
      </form>
      <div>
      <form method="POST" action="../view/recpass.php">
        <button class="btn btn-primary" id="btn-cadastro">Esqueci Minha Senha</button>
      </form>
      </div>
    </div>
  </body>
</html>