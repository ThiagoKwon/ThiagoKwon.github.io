<?php

include("../connection.php");

session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];
$ID_desafio = $_SESSION["fkID"];

$sql = "DELETE FROM Realiza WHERE fk_Cliente_NomeUsuario = '$NomeUsuario' AND fk_Desafio_ID_desafio = $ID_desafio";

$result = $conn->query($sql);

if ($result) {
    ?>
    <script>
        var confirmacao = confirm("Deseja desinscrever-se do desafio?");
        if (confirmacao) {
            window.location.href = "../userInteraction/realiza.php";
        }else {
            history.go(-1)
        }
    </script>
    <?php
}