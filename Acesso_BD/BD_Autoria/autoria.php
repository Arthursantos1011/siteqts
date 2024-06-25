<?php
include_once 'conectar.php';

class autoria
{
    private $codautor;
    private $codlivro;
    private $datalancamento;
    private $editora;
    
    private $conn;

    public function getCodautor(){
        return $this->codautor;
    }
    public function setCodautor($codaut){
        $this->codautor = $codaut;
    }

    public function getCodlivro(){
        return $this->codlivro;
    }
    public function setCodlivro($codliv){
        $this-> codlivro = $codliv;
    }

    public function getDatalancamento(){
        return $this->datalancamento;
    }
    public function setDatalancamento($dat){
        $this-> datalancamento = $dat;
    }
    
    public function getEditora(){
        return $this->editora;
    }
    public function setEditora($edit){
        $this-> editora = $edit;
    }

    function salvar()
    {
       try
       {
           $this-> conn = new conectar();
           $sql = $this->conn->prepare("insert into `autoria` values (?,?,?,?)");
           @$sql-> bindParam(1, $this->getCodlivro(), PDO::PARAM_STR );
           @$sql-> bindParam(2, $this->getCodautor(), PDO::PARAM_STR );
           @$sql-> bindParam(3, $this->getDatalancamento(), PDO::PARAM_STR );
           @$sql-> bindParam(4, $this->getEditora(), PDO::PARAM_STR );
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
            $sql = $this->conn->query("select * from autoria order by Cod_autor");
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
        $sql = $this->conn->prepare("delete from autoria where Cod_autor = ? and Cod_livro = ?");  // informei o ? (parametro)
        @$sql-> bindParam(1, $this->getCodautor(), PDO::PARAM_STR );
        @$sql-> bindParam(2, $this->getCodlivro(), PDO::PARAM_STR ); // inclui esta linha para definir o parametro
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
    $sql = $this->conn->prepare("select * from autoria where Editora like ?"); // informei o ?
    @$sql-> bindParam(1, $this->getEditora(), PDO::PARAM_STR );
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
       $sql = $this->conn->prepare("select * from autoria where Cod_autor = ?"); // informei o ? (parametro)
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
        $sql = $this->conn->prepare("update autoria set Cod_livro = ?, DataLancamento = ?, Editora = ? where Cod_autor = ?");
        @$sql-> bindParam(1, $this->getCodlivro(), PDO::PARAM_STR );
        @$sql-> bindParam(2, $this->getDatalancamento(), PDO::PARAM_STR );
        @$sql-> bindParam(3, $this->getEditora(), PDO::PARAM_STR );
        @$sql-> bindParam(4, $this->getCodautor(), PDO::PARAM_STR );
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