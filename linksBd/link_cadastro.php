<?php
include("../connection.php");

session_start();

$usuario = [
    "nome" => $_POST["nome"],
    "nomePerfil" => $_POST["nomeperfil"],
    "senha" => md5($_POST["senha"]),
    "senhaConfirm" => md5($_POST["senhaconfirm"])
];

$_SESSION["NomeUsuario"] = $usuario["nomePerfil"];

if ($usuario["senha"] === $usuario["senhaConfirm"]) {

    $sql = "INSERT INTO Cliente(Nome,NomeUsuario,Senha) VALUES ('$usuario[nome]', '$usuario[nomePerfil]', '$usuario[senhaConfirm]')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        header("Location: ../home.php");
    } else {
?>
        <script>
            alert("Campo(os) ou dado(os) inválido(os)")
            history.go(-1)
        </script>
    <?php
    }
} else {
    ?>
    <script>
        alert("Senha inválida")
        history.go(-1)
    </script>
<?php
}

?>