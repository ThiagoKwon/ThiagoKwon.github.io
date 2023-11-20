<?php
include("../connection.php");

session_start();

$funcionario = [
    "nome" => $_POST["nome"],
    "nomePerfil" => $_POST["nomePerfil"],
    "area" => $_POST["area"],
    "senha" => md5($_POST["senha"]),
    "senhaConfirm" => md5($_POST["senhaconfirm"])
];

if ($funcionario["senha"] === $funcionario["senhaConfirm"]) {

    $_SESSION["NomeUsuario"] = $usuario["nomePerfil"];

    $sql = "INSERT INTO Profissionais(Nome,NomeUsuario,AreaAtuacao,Senha) 
    VALUES ('$funcionario[nome]','$funcionario[nomePerfil]', '$funcionario[area]', '$funcionario[senhaConfirm]')";

    $result = $conn->query($sql);

    if ($result === TRUE) {
?>
        <script>
            alert("Dados cadastrados com sucesso!")
            window.location.href = "../home.php"
        </script>
    <?php

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
