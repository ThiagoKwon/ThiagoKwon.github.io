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

$sql = "UPDATE Desafio SET Nome = '$Nome', Dificuldade = '$Dif', Descricao = '$Desc',
 Periodizacao = '$Peri', Tipo = '$Tipo', Pontuacao = '$Pont', Status = '$Stats'";

$result = $conn->query($sql);

if ($result === TRUE) {
    header("Location: ../userInteraction/perfil.php?NomeUsuario=$NomeUsuario");
}else{
    ?>
    <script>
        alert("Dados devem ser preenchidos de maneira correta")
        history.go(-1)
    </script>
    <?php
}
?>