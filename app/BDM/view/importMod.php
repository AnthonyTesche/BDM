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
      <script src="../assets/js/scriptGeral.js"></script>
      <link rel="stylesheet" type="text/css" href="../assets/css/geral.css">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Import Modulos</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center mt-5" id="logo">
      <img src="../assets/img/bis2bis-floating.png" height="30%" width="30%">
    </div>
    <div class="container d-flex justify-content-center">
      <form action="../control/controleCadMod.php" method="POST" enctype="multipart/form-data">
         <input type="file" name="fileUpload" class="btn btn-primary">
         <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <div class=".'card'.">
         <div class="."card-body".">
            <?php 
            if (isset($_SESSION['msg'])){
               echo $_SESSION['msg'];
            }
            ?>
         </div>
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