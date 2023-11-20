<?php
include("../connection.php");
session_start();

$NomeUsuario = $_GET["NomeUsuario"];
$Novonome = $_POST["novoNome"];
$NovonomePerfil = $_POST["novoNomePerfil"];
$Novasenha = md5($_POST["novaSenha"]);
$NovasenhaConfirm = md5($_POST["novaSenhaConfirm"]);

if ($Novasenha === $NovasenhaConfirm) {
    if ($_SESSION["show"]) {
        $Area = $_POST["area"];
        $sql = "UPDATE Profissionais SET Nome = '$Novonome', NomeUsuario = '$NovonomePerfil', Senha = '$Novasenha', AreaAtuacao = '$Area' WHERE NomeUsuario = '$NomeUsuario'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $_SESSION["NomeUsuario"] = $NovonomePerfil;
?>
            <script>
                if (confirm("Deseja salvar suas alterações?")) {
                    window.location.href = "../userInteraction/perfil.php";
                } else {
                    window.history.back();
                }
            </script>
        <?php
        }
    } else {
        $sql = "UPDATE Cliente SET Nome = '$Novonome', NomeUsuario = '$NovonomePerfil', Senha = '$Novasenha' WHERE NomeUsuario = '$NomeUsuario'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $_SESSION["NomeUsuario"] = $NovonomePerfil;
        ?>
            <script>
                if (confirm("Deseja salvar suas alterações?")) {
                    window.location.href = "../userInteraction/perfil.php";
                } else {
                    window.history.back();
                }
            </script>
<?php
        }
    }
}
?>

