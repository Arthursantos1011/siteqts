<?php
include_once 'conectar.php';

class autor
{
    private $codautor;
    private $nomeautor;
    private $sobrenome;
    private $email;
    private $nasc;
    private $conn;

    public function getCodautor(){
        return $this->codautor;
    }
    public function setCodautor($codaut){
        $this->codautor = $codaut;
    }

    public function getNomeautor(){
        return $this->nomeautor;
    }
    public function setNomeautor($nome){
        $this->nomeautor = $nome;
    }
    
    public function getSobrenome(){
        return $this->sobrenome;
    }
    public function setSobrenome($sobnome){
        $this->sobrenome = $sobnome;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($eml){
        $this->email = $eml;
    }

    public function getNasc(){
        return $this->nasc;
    }
    public function setNasc($nascimento){
        $this->nasc = $nascimento;
    }

    function salvar()
    {
       try
       {
           $this-> conn = new conectar();
           $sql = $this->conn->prepare("insert into `autor` values (null,?,?,?,?)");
           @$sql-> bindParam(1, $this->getNomeautor(), PDO::PARAM_STR );
           @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR );
           @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR );
           @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR );
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



    function listar()
    {
        try
        {
            $this-> conn = new Conectar();
            $sql = $this->conn->query("select * from autor order by Cod_autor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;   
        }
        catch(PDOException $exc){
            echo 'Erro ao consultar a consulta'. $exc->getMessage();
        }
    }


function exclusao()
{
    try
    {
        $this-> conn = new Conectar();
        $sql = $this->conn->prepare("delete from autor where Cod_autor = ?");  // informei o ? (parametro)
        @$sql-> bindParam(1, $this->getCodautor(), PDO::PARAM_STR ); // inclui esta linha para definir o parametro
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

function consultar()
{
  try
  {
    $this-> conn = new conectar();
    $sql = $this->conn->prepare("select * from autor where NomeAutor like ?"); // informei o ?
    @$sql-> bindParam(1, $this->getNomeautor(), PDO::PARAM_STR );
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

function alterar()
{
    try
    {
       $this-> conn = new conectar();
       $sql = $this->conn->prepare("select * from autor where Cod_autor = ?"); // informei o ? (parametro)
       @$sql-> bindParam(1, $this->getCodautor(), PDO::PARAM_STR ); // inclui esta linha para definir o parametro
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
        $sql = $this->conn->prepare("update autor set NomeAutor = ?, Sobrenome = ?, Email = ?, Nasc = ? where Cod_autor = ?");
        @$sql-> bindParam(1, $this->getNomeautor(), PDO::PARAM_STR );
        @$sql-> bindParam(2, $this->getSobrenome(), PDO::PARAM_STR );
        @$sql-> bindParam(3, $this->getEmail(), PDO::PARAM_STR );
        @$sql-> bindParam(4, $this->getNasc(), PDO::PARAM_STR );
        @$sql-> bindParam(5, $this->getCodautor(), PDO::PARAM_STR );
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
}

?>