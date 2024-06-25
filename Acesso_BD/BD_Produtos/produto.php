<?php

include_once 'conectar.php';

// parte 1 - atributos
class Produto
{
    private $id;
    private $nome;
    private $estoque;
    private $conn;

// parte 2 - os gettes e setter

 public function getId(){
       return $this->id;
 }

 public function setId($iid) {
    $this->id = $iid;
 }

 public function getNome() {
    return $this->nome;
 }

 public function setNome($name) {
    $this->nome = $name;
 }

 public function getEstoque() {
    return $this->estoque;
 }

 public function setEstoque($estoqui) {
    $this->estoque = $estoqui;
 }

 //parte 3 - métodos

 function salvar()
 {
    try
    {
        $this-> conn = new conectar();
        $sql = $this->conn->prepare("insert into `exemplo_curso` values (?,?,?)");
        @$sql-> bindParam(1, $this->getId(), PDO::PARAM_STR );
        @$sql-> bindParam(2, $this->getNome(), PDO::PARAM_STR );
        @$sql-> bindParam(3, $this->getEstoque(), PDO::PARAM_STR );
        if($sql->execute() == 1)
        {
            return "Registro salvo com sucesso!";
        }
        $this->conn = null;
    }
    catch(PDOExeception  $exc)
    {
        echo "Erro ao salvar o registro. " . $exc->getMessage();
    }
 }

function alterar()
{
    try
    {
       $this-> conn = new conectar();
       $sql = $this->conn->prepare("select * from exemplo_curso where id = ?"); // informei o ? (parametro)
       @$sql-> bindParam(1, $this->getId(), PDO::PARAM_STR ); // inclui esta linha para definir o parametro
       $sql->execute();
       return $sql->fetchAll();
       $this->conn - null;
    }
    catch(PDOExeception $exc)
    {
        echo "Erro ao alterar. " . $exc->getMessage();
    }
}

function alterar2()
{
    try
    {
        $this-> conn = new conectar();
        $sql = $this->conn->prepare("update exemplo_curso set nome = ?, estoque = ? where id = ?");
        @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR );
        @$sql-> bindParam(2, $this->getEstoque(), PDO::PARAM_STR );
        @$sql-> bindParam(3, $this->getId(), PDO::PARAM_STR );
        if($sql->execute() == 1)
        {
            return "Registro alterado com sucesso!";
        }
        $this->conn = null;
    }
    catch(PDOExeception $exc)
    {
        echo "Erro ao salvar o registro. " . $exc->getMessage();
    }
}

function consultar()
{
  try
  {
    $this-> conn = new conectar();
    $sql = $this->conn->prepare("select * from exemplo_curso where nome like ?"); // informei o ?
    @$sql-> bindParam(1, $this->getNome(), PDO::PARAM_STR );
    //@$sql-> bindParam(1, $this->getNome()."%" PDO::PARAM_STR );
   $sql->execute();
   return $sql->fetchALL();
   $this->conn = null;
  }
  catch(PDOExeception $exc) 
  {
    echo "Erro ao executar conculta. " . $exc->getMessage();
  }
}

function exclusao()
{
    try
    {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("delete from exemplo_curso  where id = ?");  // informei o ? (parametro)
        @$sql-> bindParam(1, $this->getId(), PDO::PARAM_STR ); // inclui esta linha para definir o parametro
        if($sql->execute() == 1)
        {
            return "Excluido com sucesso!";
        }
        else
        {
            return "Erro na exclusão !";
        }

        $this->conn = null;
    }
    catch(PDOExeception $exc)
    {
        echo "Erro ao excluir. " . $exc->getMessage();
    }
}


function listar()
{
    try
    {
        $this-> conn = new conectar();
        $sql = $this->conn->query("select * from exemplo_curso order by nome");
        $sql->execute();
        return $sql->fetchALL();
        $this->conn = null; 
    }
    catch(PDOExeception $exc)
    {
        echo "Erro ao executar consulta. " . $exc->getMessage();
    }
}

} // encerramento da classe Produto