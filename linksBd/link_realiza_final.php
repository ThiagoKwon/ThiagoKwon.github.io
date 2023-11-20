<?php
include("../connection.php");

session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];
$ID_desafio = $_SESSION["fkID"];
$NomeDesafio = $_SESSION["NomeDesafio"];
$TipoDesafio = $_SESSION["TipoDesafio"];
$NomeProf = $_SESSION["fkPR"];

$Hora = $_POST["hora"];
$Data = $_POST["data"];


$sql = "UPDATE Realiza SET Hora = '$Hora', Data = '$Data' 
WHERE fk_Cliente_NomeUsuario = '$NomeUsuario' AND fk_Desafio_ID_desafio = $ID_desafio";

$result = $conn->query($sql);

if ($result) {
?>
    <script>
        alert("Desafio finalizado com sucesso")
        window.location.href = "../userInteraction/realiza.php"
    </script>
<?php
} else {
?>
    <script>
        alert("Dados inválidos")
        history.go(-1)
    </script>
<?php
}
