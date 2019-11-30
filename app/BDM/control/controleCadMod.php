<?php
use BDM\Models\Modulo as Modulo;
use BDM\Models\Banco as Banco;
require_once '../../../vendor/autoload.php';


if (isset($_POST['nome']) and isset($_POST['version'])){
    $nome = $call->prepare($_POST['nome']);
    $version = $call->prepare($_POST['version']);
    if (isset($_POST['categoria']) and isset($_POST['descricao'])){
        $categoria = $call->prepare($_POST['categoria']);
        $descricao = $call->prepare($_POST['descricao']);
        if (isset($_POST['composer']) and isset($_POST['link'])){
            $composer = $call->prepare($_POST['composer']);
            $link = $call->prepare($_POST['link']);
            $m = new Modulo();
            $bnn = new Banco();
            if (isset($_POST['git'])){
                $git = $call->prepare($_POST['git']);
                $m->populate($nome, $version, $categoria, $descricao, $composer, $link, $git);
                $bnn->insercaoMod($m);
                header("location: ../view/menu.php");
            }else {
                echo "Inserir informaçoes nos campos OBRIGATORIOS";
            }
        }else {
            echo "Inserir informaçoes nos campos OBRIGATORIOS";
        }
    }else {
        echo "Inserir informaçoes nos campos OBRIGATORIOS";
    }
}

if (isset($_POST['campo']) && isset($_POST['tipo'])){
    if(isset($_POST['nulo'])){
        $nulo = $call->prepare($_POST['nulo']);
        $campo = $call->prepare($_POST['campo']);
        $tipo = $call->prepare($_POST['tipo']);
        $b = new Banco();
        $a = $b->newKey($campo, $tipo, $nulo);
        header("location: ../view/menu.php");
    } else {
        $nulo = NULL;
        $campo = $call->prepare($_POST['campo']);
        $tipo = $call->prepare($_POST['tipo']);
        $b = new Banco();
        $a = $b->newKey($campo, $tipo, $nulo);
        header("location: ../view/menu.php");
    }
}

if (isset($_POST['alteracao'])){
    if (isset($_POST['atr']) && isset($_POST['alt']) && isset($_POST['codigo'])){
        $atr = $call->prepare($_POST['atr']);
        $alt = $call->prepare($_POST['alt']);
        $busca = $call->prepare($_POST['codigo']);
        $b = new Banco();
        $a = $b->updateMod($atr, $alt, $busca);
        header("location: ../view/menu.php");
    }
}

if(isset($_FILES['fileUpload'])){
    $ext = strtolower(substr($_FILES['fileUpload']['name'],-4));
    $new_name = $ext;
    $dir = '../assets/uploads';

    move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir.$new_name);

    $arquivo = fopen("../assets/uploads.csv", 'r');
    $colunas = array();
    $i = 0;
    while(!feof($arquivo)){
            $dados = fgetcsv($arquivo);
            if($i == 0){
                $colunas = $dados;
            } else {
                $tempArray = array();
                $j = 0;
                for($j = 0 ; $j < count($dados) ; $j++){                    
                    $tempArray[] = $call->prepare($dados[$j]);
                }
                $_SESSION['msg'] = "Modulos adicionados com sucesso!";
                $b = new Banco();
                $m = new Modulo();
                $m->populateArray($tempArray);
                $b->insercaoMod($m);
            }
            $i++;
        }
        fclose($arquivo);
        header("location: ../view/importMod.php");
}

if(isset($_POST["export"])){
      $b = new Banco();
      header('Content-Type: text/csv;');
      header('Content-Disposition: attachment; filename=data.csv');
      $output = fopen("php://output", "w");
      fputcsv($output, array('codigo', 'codUser', 'nome', 'version', 'descricao', 'categoria', 'link', 'composer', 'git'));
      $query = $b->coletaCodigo();
      $result = mysqli_query($b->getLink(), $query);
      while($row = mysqli_fetch_assoc($result)){  
           fputcsv($output, $row);
      }  
      fclose($output);
      header("location: ../view/menu.php");
}
?>