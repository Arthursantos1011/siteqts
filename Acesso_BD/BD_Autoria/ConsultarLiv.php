<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Livros Cadastrados</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            text-align: center;
            background-color: #1C1C1C; 
            margin-top: 5rem;
            color: #fff;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        form {
            width: 70%;
            margin: 0 auto;
        }

        fieldset {
            border: none;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: transparent;
        }

        legend {
            font-size: 24px;
            font-weight: bold;
            color: #00FA9A;
        }

        label {
            font-size: 20px;
            color: #00FA9A;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            border: 1px solid #fff;
            border-radius: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            font-size: 20px;
            background-color: #00FA9A; 
            background-color: #00FA9A;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #fff;
        }

        #resultado {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
            color: #fff;
        }

        a {
            text-decoration: none;
            font-size: 20px;
            color: #1C1C1C;
        }

        button {
            padding: 10px 20px;
            font-size: 20px;
            background-color: #00FA9A; 
            background-color: #00FA9A;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        button:hover {
            background-color: #fff; 
        }
    </style>

<center><font face = "Century Gotchic" size = "6"><b>Consulta de Livros Cadastrados</b><font size = "4">

<font face = "Century Gotchic" size = "3"><b>

    </b></center>

<font size = "4">

<form name="cliente" method="POST" action="">
    <fieldset id="a">
        <legend><b> Informe o Nome do Livro desejado: </b></legend>
        <p> Nome: <input name="txtTit" type="text" size="40" maxlength="40" placeholder="Nome do Livro" required></p>
    </fieldset>
    <br><br><center>
        <input name="btnenviar" type="submit" value="Pesquisar" > &nbsp;&nbsp;
        <input name="limpar" type="reset" value="Limpar" >
    </fieldset>
</form>

<fieldset id="b">
    <legend ><b> Resultado: </b></legend>
 
    <?php
extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar))
{
    include_once "livro.php";
    $p = new livro();
    $p->setTitulo($txtTit. '%');
    $pro_bd=$p->consultar();
    foreach($pro_bd as $pro_mostar)
    {
        ?> <br>
        <b> <?php echo "Código do livro: " . $pro_mostar[0]; ?></b> &nbsp;&nbsp;&nbsp;
        <b> <?php echo "Titulo: " . $pro_mostar[1]; ?></b> &nbsp;&nbsp;&nbsp;
        <b> <?php echo "Categoria: " . $pro_mostar[2]; ?></b> &nbsp;&nbsp;&nbsp;
        <b> <?php echo "ISBN: " . $pro_mostar[3]; ?></b> &nbsp;&nbsp;&nbsp;
        <b> <?php echo "Idioma: " . $pro_mostar[4]; ?></b> &nbsp;&nbsp;&nbsp;
        <b> <?php echo "Quantidade de Páginas: " . $pro_mostar[5]; ?></b> 
        <?php
    }
}
?>
</fieldset>
<center> <br><br><br><br>
<button><a href = "Menu1.html"> Voltar </a></button>

</body>
</html>