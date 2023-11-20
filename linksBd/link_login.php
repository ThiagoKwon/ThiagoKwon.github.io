<?php
include("../connection.php");

session_start();

$usuario = [
    "nomePerfil" => $_POST["nomeperfil"],
    "senha" => md5($_POST["senhalogin"])
];

$_SESSION["NomeUsuario"] = $usuario["nomePerfil"];

$sql = "SELECT * FROM Cliente WHERE NomeUsuario = '$usuario[nomePerfil]' AND Senha = '$usuario[senha]'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION["show"] = FALSE;
        header("Location: ../userInteraction/perfil.php");
    }
} else {
    $sql = "SELECT * FROM Profissionais WHERE NomeUsuario = '$usuario[nomePerfil]' AND Senha = '$usuario[senha]'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["show"] = TRUE;
        $_SESSION["func"] = TRUE;
        while ($row = $result->fetch_assoc()) {
            header("Location: ../userInteraction/perfil.php");
        }
    } else {
?>
        <script>
            alert("Senha e/ou Nome incorreto(os)")
            history.go(-1)
        </script>
<?php
    }
}
