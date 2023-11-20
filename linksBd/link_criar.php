<?php
include("../connection.php");

$NomeUsuario = $_GET["NomeUsuario"];
$Nome = $_POST["nome"];
$Dif = $_POST["dif"];
$Desc = $_POST["desc"];
$Peri = $_POST["peri"];
$Tipo = $_POST["tipo"];
$Pont = $_POST["pont"];
$Stats = $_POST["stats"];

$sql = "INSERT INTO Desafio(ID_desafio, Nome, Dificuldade, Descricao, Periodizacao, Tipo, 
Pontuacao, Status, fk_Profissionais_NomeUsuario) VALUES (17,'$Nome', '$Dif', '$Desc', '$Peri', '$Tipo', '$Pont', '$Stats', '$NomeUsuario')";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: ../userInteraction/perfil.php?NomeUsuario=$NomeUsuario");
}
?>