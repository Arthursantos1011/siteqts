<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Autores Cadastrados</title>
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

<?php

include_once 'autor.php';
$p = new autor();
$pro_bd = $p->listar();

?>
</style>
</head>
<body>
<section>
<br>
<table style="width:70%; margin: 0 auto; border-collapse: collapse; color: #fff;">
<tr>
<th>Codigo do Autor</th>
<th>Nome do Autor</th>
<th>Sobrenome</th>
<th>Email</th>
<th>Data de Nascimento</th>
</tr>
<?php
            if (is_array($pro_bd)) {
                foreach ($pro_bd as $pro_mostrar) {
                    echo "<tr>";
                    echo "<td>" . $pro_mostrar[0] . "</td>";
                    echo "<td>" . $pro_mostrar[1] . "</td>";
                    echo "<td>" . $pro_mostrar[2] . "</td>";
                    echo "<td>" . $pro_mostrar[3] . "</td>";
                    echo "<td>" . $pro_mostrar[4] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
</table>
<br><br>
<button> <a href='Menu2.html'>Voltar</a></button>
</section>
</body>
</html>