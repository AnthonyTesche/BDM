<?php
namespace BDM\Models;
require_once '../../../vendor/autoload.php';

class Banco{
    private $link;

    public function __construct(){
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);
        if($this->link = mysqli_connect($server, $username, $password)) {
            $result = mysqli_query($this->link, "USE ".$db.";");
            return true;
        } else {
            print "Erro ao se conectar com Banco";
        }
        return $this->link;
    }

    public function getLink(){
        return $this->link;
    }

    public function coletaAll(){
        $result = mysqli_query($this->link, "SELECT * FROM modulos ORDER BY nome");
        return $result;
    }

    public function coletaCodigo(){
        $query = "SELECT * from modulos ORDER BY codigo;";
        return $query;
    }

    public function coletaModNome($atr, $atr2 , $busca, $busca2){
        $query = mysqli_query($this->link, "SELECT codigo ,nome, version, descricao, categoria, link, composer, git FROM modulos WHERE $atr LIKE '%$busca%' AND $atr2 LIKE '%$busca2%'");
        $totalTabelas = mysqli_num_rows($query);
        if (($totalTabelas) == 0){
            print("Modulo Inexistente!");
            exit();
        }
        $i = 0;
        while($i <= $totalTabelas){
            $tabelas[$i] = mysqli_fetch_assoc($query);
            print "<tr>";
            print "<td>".$tabelas[$i]['codigo']."</td>";
            print "<td>".$tabelas[$i]['nome']."</td>";
            print "<td>".$tabelas[$i]['version']."</td>";
            print "<td>".$tabelas[$i]['descricao']."</td>";
            print "<td>".$tabelas[$i]['categoria']."</td>";
            print "<td>".$tabelas[$i]['link']."</td>";
            print "<td>".$tabelas[$i]['composer']."</td>";
            print "<td>".$tabelas[$i]['git']."</td>";
            print "</tr>";
            $i++;
        }
        return $query;
    }

    public function coletaUser($user, $senha){
        $query = mysqli_query($this->link, "SELECT * FROM usuario WHERE nome = '$user' AND senha = '$senha'");
        return $query;
    }

    public function coletaPerm($user, $senha){
        $query = mysqli_query($this->link, "SELECT permissao FROM usuario WHERE nome = '$user' AND senha = '$senha'");
        return $query;
    }

    public function insercaoUser($c){
        $result = mysqli_query($this->link, "INSERT INTO usuario(nome, senha, email, permissao) VALUES ('".$c->getLogin()."', '".$c->getSenha()."', '".$c->getEmail()."', '".$c->getPermissao()."');");
    }
    
    public function insercaoMod($m){
        $a = mysqli_query($this->link, "INSERT INTO modulos (nome, version, descricao, categoria, link, composer, git) VALUES ('".$m->getNome()."', '".$m->getVersion()."', '".$m->getdescricao()."', '".$m->getCategoria()."', '".$m->getLink()."', '".$m->getComposer()."', '".$m->getGit()."');");
    }

    public function recPass(){
        $user = mysqli_real_escape_string($this->link, $_POST['email']);
        $qry = mysqli_query($this->link, "SELECT * FROM usuario WHERE email = '$user'");
        if(mysqli_affected_rows($this->link)){

            $chave = sha1(uniqid( mt_rand(), true));
      
            $conf = mysqli_query($this->link, "INSERT INTO resgate VALUES ('$user', '$chave')");
       
            if(mysqli_affected_rows($this->link)){
              $link = "https://test-scrap-py.herokuapp.com/app/BDM/view/recuperar.php?utilizador=$user&confirmacao=$chave";
              try{
                  mail($user, 'Recuperação de senha', 'Olá '.$user.', entre neste link '.$link);
                  if( mail($user, 'Recuperação de senha', 'Olá '.$user.', entre neste link '.$link) ){
                    echo '<p>Foi enviado um e-mail para o seu endereço, onde poderá encontrar um link único para alterar sua senha</p>';
          
                  } else {
                    echo '<p>Erro ao encaminhar email </p>';
          
                  }
              } catch (Exception $e){
                echo $e;
              }
            } else {
              echo '<p>Não foi possível gerar o endereço único</p>';
      
            }
          } else {
              echo '<p>Acesso Inexistente</p>';
          }
    }

    public function updateInfo($senha, $email){
        $qry = mysqli_query($this->link, "UPDATE usuario SET senha = '$senha' WHERE  email='$email';");
    }

    public function delete($user, $hash){
        $query = mysqli_query($this->link, "DELETE FROM resgate WHERE user = '$user' AND confirmacao = '$hash'");
    }

    public function limpezaRec(){
        if( empty($_GET['utilizador']) || empty($_GET['confirmacao']) )
            die('<p>Não é possível alterar a password: dados em falta</p>');
            
            $user = mysqli_real_escape_string($this->link, $_GET['utilizador']);
            $_SESSION['user'] = $user;
            $hash = mysqli_real_escape_string($this->link, $_GET['confirmacao']);
        
            $q = mysqli_query($this->link, "SELECT COUNT(*) FROM resgate WHERE user = '$user' AND confirmacao = '$hash'");

            $this->delete($user, $hash);
            return $q;
    }

    public function newKey($campo, $tipo, $nulo){
        $query = mysqli_query($this->link, "ALTER TABLE modulos ADD $campo $tipo $nulo");
        return $query;
    }

    public function updateMod($atr, $alt, $busca){
        $qry = mysqli_query($this->link, "UPDATE modulos SET $atr = '$alt' WHERE codigo = $busca;");
    }

    public function prepare($string){
        $string = mysqli_real_escape_string($this->link, $string);
        return $string;
    }
}
?>