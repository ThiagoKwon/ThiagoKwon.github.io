<?php
include("../connection.php");

// $NomeUsuario = $_GET["NomeUsuario"];
session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];
$show = $_SESSION["show"] ?? NULL;

$sql = "SELECT * FROM Cliente WHERE NomeUsuario = '$NomeUsuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nome = $row["Nome"];
        $nomePerfil = $row["NomeUsuario"];
    }
} else if ($result->num_rows == 0) {

    $sql2 = "SELECT * FROM Profissionais WHERE NomeUsuario = '$NomeUsuario'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nome = $row["Nome"];
            $nomePerfil = $row["NomeUsuario"];
            $Area = $row["AreaAtuacao"];
        }
    }
}
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Perfil</title>
</head>

<body>
    <style>
        .table-tot,
        .table-desafios {
            display: flex;
            flex-direction: column;
            background-color: #067aa5;
            width: 800px;
            height: auto;
        }

        .table-desafios {
            padding-bottom: 20px;
            margin-bottom: 10px;
        }

        table {
            display: flex;
            margin: auto;
        }

        #tb-left {
            display: flex;
            flex-direction: column;
            width: 200px;
            margin-right: 20px;
        }

        #tb-right {
            display: flex;
            flex-direction: column;
        }

        tbody {
            display: flex;

        }

        td {
            padding: 10px;
            margin: 2px;
            border-bottom: 2px solid black;
            width: auto;
            height: auto;
            font-size: 20px;
        }

        #tb-right td {
            padding: 10px;
            width: 300px;
        }

        #perfil-titulo {
            text-align: center;
            padding-bottom: 20px;
            text-transform: uppercase;
        }

        .options {
            display: flex;
            align-items: center;
            justify-content: space-around;
            width: 100%;
        }

        .options2 {
            display: flex;
            align-items: center;
            width: 48%;
        }

        .options2 a {
            border: solid white 2px;
        }

        .options a, .options2 a {
            margin: 10px;
            font-size: 20px;
            background-color: #0E0E35;
            width: 150px;
            padding: 7px;
            text-align: center;
            text-decoration: none;
            border-radius: 15px;
        }

        .options a:hover, .options2 a:hover {
            background-color: red;
        }
    </style>
    <div class="navbar">
        <div class="navright">
            <a href="../home.php"><img id="logo" src="../img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
        <div class="options2">
            <a href="./logout.php" onclick="logout()">LOGOUT</a>
        </div>
    </div>

    <div class="table-tot">
        <table>
            <h2 id="perfil-titulo">PERFIL DO <?php echo $nomePerfil ?></h2>
            <tr id="tb-left">
                <td>
                    Nome:
                </td>
                <td>
                    Nome do Perfil:
                </td>
                <?php $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                ?>
                    <td>
                        Área de atuação:
                    </td>
                <?php
                } ?>
            </tr>
            <tr id="tb-right">
                <td>
                    <?php echo $nome ?>
                </td>
                <td>
                    <?php echo $nomePerfil ?>
                </td>
                <?php $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                ?>
                    <td>
                        <?php echo $Area ?>
                    </td>
                <?php
                } ?>
            </tr>
        </table>
        <div class="options">
            <a href="editar.php?NomeUsuario=<?php echo $NomeUsuario ?> ">EDITAR</a>
            <a href="../linksBd/link_deletar.php?NomeUsuario=<?php echo $NomeUsuario ?>">DELETAR</a>
        </div>
    </div><br>
    <?php
    if ($show) {

        $sql2 = "SELECT * FROM Desafio WHERE fk_Profissionais_NomeUsuario = '$NomeUsuario'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            $rows = mysqli_fetch_all($result2, MYSQLI_ASSOC);
            foreach ($rows as $row) {
    ?>
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
                        </tr>
                        <tr id="tb-right">
                            <td><?php echo $row["ID_desafio"] ?></td>
                            <td><?php echo $row["Nome"] ?></td>
                            <td><?php echo $row["Dificuldade"] ?></td>
                            <td><?php echo $row["Descricao"] ?></td>
                            <td><?php echo $row["Periodizacao"] ?></td>
                            <td><?php echo $row["Tipo"] ?></td>
                            <td><?php echo $row["Pontuacao"] ?></td>
                            <td><?php echo $row["Status"] ?></td>
                        </tr>
                    </table>
                    <div class="options">
                        <a href="editar_desafio.php?NomeUsuario=<?php echo $NomeUsuario ?>">EDITAR</a>
                        <a href="../linksBd/link_deletar_desafio.php?ID_desafio=<?php echo $row['ID_desafio'] ?>&NomeUsuario=<?php echo $NomeUsuario ?>">DELETAR</a>
                    </div>
                </div>
            <?php

            }
        } else {
            ?>
            <h2 style="text-align: center;">Não há desafios disponíveis</h2>
        <?php
        }
        ?>


        <div class="options">
            <a href="criar.php?NomeUsuario=<?php echo $NomeUsuario ?>">CRIAR DESAFIO</a>
        </div>
    <?php
    }
    ?>
    <script>
        function logout() {
            alert("Logout realizado com sucesso")
        }
    </script>

</body>

</html>