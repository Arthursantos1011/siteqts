<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../BD_Produtos/login.js"></script>
    <title>Cadastro de autoria</title>
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
<form name="cliente" method="POST" action="">
    <fieldset id="a">
        <legend><b> Dados do Autor: </b></legend>
        <p> Código do autor: <input name="txtcodaut" type="text" size="40" maxlength="40" placeholder="0" required onkeypress="return blokletras(window.event.keyCode)"></p>
        <p> Código Livro: <input name="txtcodliv" type="text" size="40" maxlength="40" placeholder="0" required onkeypress="return blokletras(window.event.keyCode)"></p>
        <p> Data de Lançamento: <input name="txtdtl" type="date" size="40" maxlength="40" placeholder="0" required></p>
        <p> Editora: <input name="txtedit" type="text" size="40" maxlength="40" placeholder="Editora do Livro" required></p>
    </fieldset>
    <br>
    <fieldset id="b">
        <legend ><b> Opções: </b></legend>
        <br>
        <input name="btnenviar" type="submit" value="Cadastrar" > &nbsp;&nbsp;
        <input name="limpar" type="reset" value="limpar" >
    </fieldset>
</form>
 
<?php
extract($_POST, EXTR_OVERWRITE);
if(isset($btnenviar))
{
    include_once 'autoria.php';
    $pro=new autoria();
    $pro->setCodautor($txtcodaut);
    $pro->setCodlivro($txtcodliv);
    $pro->setDatalancamento($txtdtl);
    $pro->setEditora($txtedit);
    echo "<h3><br>" . $pro->salvar() . "</h3>";
}
?>
<button><a href="Menu3.html">Voltar</a></button>
</body>
</html>