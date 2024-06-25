<?php
include_once 'conectar.php';

class livro
{
    private $codlivro;
    private $titulo;
    private $categoria;
    private $isbn;
    private $idioma;
    private $qtdepag;
    private $conn;

    public function getCodlivro(){
        return $this->codlivro;
    }
    public function setCodlivro($codliv){
        $this-> codlivro = $codliv;
    }

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($tit){
        $this-> titulo = $tit;
    }

    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($catg){
        $this-> categoria = $catg;
    }

    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($isb){
        $this-> isbn = $isb;
    }

    public function getIdioma(){
        return $this->idioma;
    }
    public function setIdioma($idi){
        $this-> idioma = $idi;
    }

    public function getQtdepag(){
        return $this->qtdepag;
    }
    public function setQtdepag($pag){
        $this-> qtdepag = $pag;
    }

    function salvar()
    {
       try
       {
           $this-> conn = new conectar();
           $sql = $this->conn->prepare("insert into `livro` values (null,?,?,?,?,?)");
           @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR );
           @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR );
           @$sql-> bindParam(3, $this->getIsbn(), PDO::PARAM_STR );
           @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR );
           @$sql-> bindParam(5, $this->getQtdepag(), PDO::PARAM_STR );
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
            $sql = $this->conn->query("select * from livro order by Cod_livro");
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
        $sql = $this->conn->prepare("delete from livro where Cod_livro = ?");  // informei o ? (parametro)
        @$sql-> bindParam(1, $this->getCodlivro(), PDO::PARAM_STR ); // inclui esta linha para definir o parametro
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
    $sql = $this->conn->prepare("select * from livro where Titulo like ?"); // informei o ?
    @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR );
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
       $sql = $this->conn->prepare("select * from livro where Cod_livro = ?"); // informei o ? (parametro)
       @$sql-> bindParam(1, $this->getCodlivro(), PDO::PARAM_STR ); // inclui esta linha para definir o parametro
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
        $sql = $this->conn->prepare("update livro set Titulo = ?, Categoria = ?, ISBN = ?, Idioma = ?, QtdePag = ? where Cod_livro = ?");
        @$sql-> bindParam(1, $this->getTitulo(), PDO::PARAM_STR );
        @$sql-> bindParam(2, $this->getCategoria(), PDO::PARAM_STR );
        @$sql-> bindParam(3, $this->getIsbn(), PDO::PARAM_STR );
        @$sql-> bindParam(4, $this->getIdioma(), PDO::PARAM_STR );
        @$sql-> bindParam(5, $this->getQtdepag(), PDO::PARAM_STR );
        @$sql-> bindParam(6, $this->getCodlivro(), PDO::PARAM_STR );
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