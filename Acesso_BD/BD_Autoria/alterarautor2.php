<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../BD_Produtos/login.js"></script>
    <title>Ateração de Autores Cadastrados</title>
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

<center><font face = "Century Gotchic" size = "6"><b>Alteração do Autor</b><font size = "4">

<font face = "Century Gotchic" size = "3"><b>

    <legend><b> Alterar </b></legend>

    <?php

            $txtcod=$_POST["txtcod"];
            include_once 'autor.php';
            $p = new autor();
            $p->setCodautor($txtcod);
            $pro_bd=$p->alterar();
            ?>
            <form name="cliente2" method="POST" action="">
                <?php
                foreach($pro_bd as $pro_mostrar)
                {
                    ?>
                    <input type="hidden" name="txtcod" size="5" value='<?php echo $pro_mostrar[0]?>' required>
                    <b><?php echo "Código: ". $pro_mostrar[0]; ?></b>
                    <br><br><b><?php echo "Nome do Autor: " ;?></b>
                    <input type="text" name="txtnome" size="25" value='<?php echo $pro_mostrar[1]?>' required>
                    <br><br><b><?php echo "Sobrenome: " ;?></b>   
                    <input type="text" name="txtsob" size="10" value='<?php echo $pro_mostrar[2]?>' required> 
                    <br><br><b><?php echo "Email: " ;?></b>   
                    <input type="text" name="txtema" size="10" value='<?php echo $pro_mostrar[3]?>' required>
                    <br><br><b><?php echo "Data de Nascimento: " ;?></b>   
                    <input type="text" name="txtnas" size="10" value='<?php echo $pro_mostrar[4]?>' required onkeypress="return blokletras(window.event.keyCode)"> 
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

    include_once 'autor.php';

    $pro = new autor();
    $pro->setNomeautor($txtnome);
    $pro->setSobrenome($txtsob);
    $pro->setEmail($txtema);
    $pro->setNasc($txtnas);
    $pro->setCodautor($txtcod);
    echo "<br><br><h3>". $pro->alterar2() . "</h3>";
    header("location:alterarautor.php");          
}
?>
</div>
</body>
</html>