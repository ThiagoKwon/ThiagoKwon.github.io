<?php
include("../connection.php");

session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];
$ID_desafio = $_SESSION["ID_desafio"];

$sql = "INSERT INTO Realiza(fk_Desafio_ID_desafio, fk_Cliente_NomeUsuario) VALUES ($ID_desafio,'$NomeUsuario')";
$result = $conn->query($sql);

if ($result) {
    ?>
    <script>
        alert("Sucesso na inscrição")
        window.location.href = "../userInteraction/realiza.php"
    </script>
    <?php
}else{
    ?>
    <script>
        alert("Você já está inscrito neste desafio")
        window.location.href = "../userInteraction/realiza.php"
    </script>
    <?php
}