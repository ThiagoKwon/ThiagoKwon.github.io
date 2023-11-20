<?php
include("../connection.php");

$NomeUsuario = $_GET["NomeUsuario"];

$sql = "SELECT * FROM Desafio WHERE fk_Profissionais_NomeUsuario = '$NomeUsuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nome = $row["Nome"];
        $dif = $row["Dificuldade"];
        $desc = $row["Descricao"];
        $peri = $row["Periodizacao"];
        $tipo = $row["Tipo"];
        $pont = $row["Pontuacao"];
        $stats = $row["Status"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Editar Desafio</title>
</head>

<body>
    <style>
    </style>
    <div class="navbar">
        <div class="navright">
            <a href="../home.php"><img id="logo" src="../img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
        <div class="navleft">

        </div>
    </div>
    <h2 style="text-align: center;">EDITAR DESAFIO</h2>
    <form action="../linksBd/link_editar_desafio.php?NomeUsuario=<?php echo $NomeUsuario ?>" method="post">
        <div class="box-tot" style="margin-top: 30px;">
            <div class="box-ajust">
                <div class="box-right">
                    Nome:
                </div>
                <div class="box-left">
                    <input type="text" name="nome" placeholder="<?php echo $nome ?>">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Dificuldade:
                </div>
                <div class="box-left">
                    <input type="text" name="dif" placeholder="<?php echo $dif ?>">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Descrição:
                </div>
                <div class="box-left">
                    <input type="text" name="desc" placeholder="<?php echo $desc ?>">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Periodização:
                </div>
                <div class="box-left">
                    <input type="text" name="peri" placeholder="<?php echo $peri ?>">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Tipo:
                </div>
                <div class="box-left">
                    <input type="text" name="tipo" placeholder="<?php echo $tipo ?>">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Pontuação:
                </div>
                <div class="box-left">
                    <input type="text" name="pont" placeholder="<?php echo $pont ?>">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Status:
                </div>
                <div class="box-left">
                    <input type="text" name="stats" placeholder="<?php echo $stats ?>">
                </div>
            </div><br>
            <a href=""><button value="salvar" id="save">Salvar</button><br></a>
        </div>
    </form>
</body>

</html>