<?php
include("../connection.php");

session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>DESAFIOS</title>
    <style>
        .table-desafios {
            display: flex;
            flex-direction: column;
            margin: auto;
        }

        .table-desafio {
            margin-top: 50px;
        }

        option {
            color: black;
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
        }

        form {
            margin: 0;
        }

        label {
            display: flex;
            margin: 0;
            padding-right: 10px;
            text-align: center;
        }

        .op {
            display: flex;
            flex-direction: column-reverse;
        }

        #pesquisar {
            padding: 10px;
            border-radius: 15px;
            background-color: #067aa5;
            border: solid 2px white;
        }

        #pesquisar:hover {
            background-color: green;
        }

        i:hover {
            color: green;
        }

        .table-desafios {
            border: 2px solid #0E0E35;
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            max-width: 200px;
        }

        th {
            background-color: #067aa5;
            color: white;
        }

        #tb-left td,
        #tb-right td {
            width: auto;
        }

        #tb-left {
            width: 25%;
        }

        #tb-right {
            width: 75%;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #067aa5;
            background-color: #067aa5;
            width: 200px;
            border-radius: 15px;
        }

        .align {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navright">
            <a href="../home.php"><img id="logo" src="../img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
    </div>
    <form action="./realiza.php" method="post" style="display: flex;">
        <div class="op">
            <select name="filtro" id="" style="color: black;margin:0;">
                <option value="Cardio">cardio</option>
                <option value="Treino">treino</option>
                <option value="Flexibilidade">flexibilidade</option>
                <option value="Alimentação">alimentação</option>
            </select>
            <label for="filtro">Escolha o tipo de desafio: </label>
        </div>
        <div class="align">
            <input id="pesquisar" type="submit" value="Pesquisar">
        </div>
    </form>
</body>

</html>

<?php
$filtro = $_POST["filtro"] ?? NULL;


if (isset($filtro)) {
?>
    <h2 style="color: white; font-size:20px;">DESAFIOS DISPONÍVEIS</h2>
    <?php
    $sql = "SELECT * FROM Desafio WHERE Tipo = '$filtro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) { ?>
        <div class="table-desafios" style="border: #0E0E35 solid 2px;">
            <table>
                <tr id="tb-left">
                    <td>ID_desafio:</td>
                    <td>Nome:</td>
                    <td>Dificuldade:</td>
                    <td>Descricao:</td>
                    <td>Periodizacao:</td>
                    <td>Tipo:</td>
                    <td>Pontuacao:</td>
                    <td>Status:</td>
                    <td>Criador:</td>
                    <td style="text-align: center;">Inscrever-se:</td>
                </tr>
                <?php
                $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $count = 0;

                foreach ($rows as $row) {
                    if ($count % 1 == 0) {
                        $_SESSION["ID_desafio"] = $row["ID_desafio"];
                        echo '<tr id="tb-right">';
                    }
                ?>
                    <td><?php echo $row["ID_desafio"] ?></td>
                    <td><?php echo $row["Nome"] ?></td>
                    <td><?php echo $row["Dificuldade"] ?></td>
                    <td><?php echo $row["Descricao"] ?></td>
                    <td><?php echo $row["Periodizacao"] ?></td>
                    <td><?php echo $row["Tipo"] ?></td>
                    <td><?php echo $row["Pontuacao"] ?></td>
                    <td><?php echo $row["Status"] ?></td>
                    <td><?php echo $row["fk_Profissionais_NomeUsuario"] ?></td>
                    <td style="text-align: center;"><a href="../linksBd/link_realiza.php"><i class="glyphicon glyphicon-thumbs-up"></i></a></td>
                <?php
                    $_SESSION["fkPR"] = $row["fk_Profissionais_NomeUsuario"];
                    if ($count % 1 != 0) {
                        echo '</tr>';
                    }

                    $count++;
                }
                if ($count % 1 != 0) {
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    <?php
    } else {
    ?>
        <h2>Não há desafios disponíveis</h2>
<?php
    }
}
?>

<?php
$sql = "SELECT r.*, d.Nome AS NomeDesafio, d.Tipo AS TipoDesafio
FROM Realiza r
INNER JOIN Desafio d ON r.fk_Desafio_ID_desafio = d.ID_desafio
WHERE r.fk_Cliente_NomeUsuario = '$NomeUsuario'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row["Hora"] === NULL) {
?>
            <div class="table-desafio">
                <h2 style="color: white; font-size:20px;">DESAFIOS INSCRITOS</h2>
                <table>
                    <tr id="tb-left">
                        <td>ID_desafio:</td>
                        <td>Nome do Cliente:</td>
                        <td>Nome do Desafio:</td>
                        <td>Tipo do Desafio:</td>
                        <td style="text-align: center;">Desinscrever-se:</td>
                        <td style="text-align: center;">Finalizar desafio:</td>
                    </tr>

                    <?php

                    ?>
                    <tr id="tb-right">
                        <td><?php echo $row["fk_Desafio_ID_desafio"]; ?></td>
                        <td><?php echo $row["fk_Cliente_NomeUsuario"]; ?></td>
                        <td><?php echo $row["NomeDesafio"]; ?></td>
                        <td><?php echo $row["TipoDesafio"]; ?></td>
                        <td style="text-align: center;"><a href="../linksBd/link_realiza_delete.php"><i class="glyphicon glyphicon-remove"></i></a></td>
                        <td style="text-align: center;"><a href="./realiza_final.php"><i class="glyphicon glyphicon-thumbs-up"></i></a></td>
                    </tr>
        <?php
            $_SESSION["fkID"] = $row["fk_Desafio_ID_desafio"];
            $_SESSION["NomeDesafio"] = $row["NomeDesafio"];
            $_SESSION["TipoDesafio"] = $row["TipoDesafio"];
        }
    }
}
        ?>
                </table>
            </div>



            <?php
            $sql = "SELECT r.*, d.Nome AS NomeDesafio, d.Tipo AS TipoDesafio, d.fk_Profissionais_NomeUsuario AS NomeProf
FROM Realiza r
INNER JOIN Desafio d ON r.fk_Desafio_ID_desafio = d.ID_desafio
WHERE r.fk_Cliente_NomeUsuario = '$NomeUsuario'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["Hora"] !== NULL) {
            ?>
                        <div class="table-desafio">
                            <h2 style="color: white; font-size:20px;">DESAFIOS FINALIZADOS</h2>
                            <table>
                                <tr id="tb-left">
                                    <td>ID_desafio:</td>
                                    <td>Nome do Cliente:</td>
                                    <td>Nome do Desafio:</td>
                                    <td>Tipo do Desafio:</td>
                                    <td>Criador do desafio:</td>
                                    <td>Hora do término:</td>
                                    <td>Data do término:</td>
                                </tr>

                                <?php
                                ?>
                                <tr id="tb-right">
                                    <td><?php echo $row["fk_Desafio_ID_desafio"]; ?></td>
                                    <td><?php echo $row["fk_Cliente_NomeUsuario"]; ?></td>
                                    <td><?php echo $row["NomeDesafio"]; ?></td>
                                    <td><?php echo $row["TipoDesafio"]; ?></td>
                                    <td><?php echo $row["NomeProf"]; ?></td>
                                    <td><?php echo $row["Hora"]; ?></td>
                                    <td><?php echo $row["Data"]; ?></td>
                                </tr>
                            <?php
                        }
                            ?>
                            <?php
                            ?>
                            </table>
                        </div>
                        </div>
                <?php
                }
            };
