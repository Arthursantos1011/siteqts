<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Livros Cadastrados</title>
    <style>
        body {
            font-family: "Century Gothic", sans-serif;
            text-align: center;
            background-color: #1C1C1C; 
            margin-top: 5rem;
            color: #00FA9A;
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
            color: #fff;;
        }

        label {
            font-size: 20px;
            color: #fff;
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
            color: #1C1C1C;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
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

<center><font face = "Century Gotchic" size = "6"><b>Alteração do Produto</b><font size = "4">

<font face = "Century Gotchic" size = "3"><b>

    <legend><b> Alterar </b></legend>

    <?php

            $txtid=$_POST["txtid"];
            include_once 'produto.php';
            $p = new Produto();
            $p->setId($txtid);
            $pro_bd=$p->alterar();
            ?>
            <form name="cliente2" method="POST" action="">
                <?php
                foreach($pro_bd as $pro_mostrar)
                {
                    ?>
                    <input type="hidden" name="txtid" size="5" value='<?php echo $pro_mostrar[0]?>'>
                    <b><?php echo "ID: ". $pro_mostrar[0]; ?></b>
                    <br><br><b><?php echo "Nome: " ;?></b>
                    <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>'>
                    <br><br><b><?php echo "Estoque: " ;?></b>   
                    <input type="text" name="txtestoq" size="10" value='<?php echo $pro_mostrar[2]?>'required onkeypress="return blokletras(window.event.keyCode)"> 
                    <br><br><br><center>
                    <input name = "btnalterar" type="submit" value="Alterar">
                    <?php
        }
    ?>
    </form>
 </fieldset>

 <?php

extract($_POST, EXTR_OVERWRITE);

if(isset($btnalterar))

{

    include_once 'Produto.php';

    $pro = new Produto();
    $pro->setEstoque($txtestoq);
    $pro->setNome($txtnome);
    $pro->setId($txtid);
    echo "<br><br><h3>". $pro->alterar2() . "</h3>";
    header("location:consultar_alt.php");          
}
?>
</div>
</body>
</html>