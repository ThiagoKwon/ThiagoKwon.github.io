<?php
include("../connection.php");
session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];
$show = FALSE;

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
    $show = TRUE;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Editar</title>
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
    <h2 style="text-align: center;">EDITAR PERFIL</h2>
    <form action="../linksBd/link_editar.php?NomeUsuario=<?php echo $NomeUsuario ?>" method="post">
        <div class="box-tot" style="margin-top: 30px;">
            <div class="box-ajust">
                <div class="box-right">
                    Novo nome:
                </div>
                <div class="box-left">
                    <input type="text" name="novoNome" placeholder="<?php echo "$nome" ?>">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Novo nome de Perfil:
                </div>
                <div class="box-left">
                    <input type="text" name="novoNomePerfil" placeholder="<?php echo $NomeUsuario ?>">
                </div>
            </div>
            <?php
            if ($show === TRUE) {
            ?>
                <div class="box-ajust">
                    <div class="box-right">
                        Área de atuação:
                    </div>
                    <div class="box-left">
                        <input type="text" name="area" placeholder="<?php echo $Area ?>">
                    </div>
                </div>
            <?php
            }
            ?>

            <div class="box-ajust">
                <div class="box-right">
                    Nova senha:
                </div>
                <div class="box-left">
                    <input type="password" name="novaSenha" placeholder="Digite uma nova senha">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Confirme a senha:
                </div>
                <div class="box-left">
                    <input type="password" name="novaSenhaConfirm" placeholder="Confirme a senha">
                </div>
            </div><br>
            <a href=""><button value="salvar" id="save">Salvar</button><br></a>
        </div>
    </form>
</body>

</html>