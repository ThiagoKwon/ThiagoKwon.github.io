<?php
include("../connection.php");

$ID_desafio = $_GET['ID_desafio'];
$NomeUsuario = $_GET['NomeUsuario'];

$sql = "DELETE FROM Desafio WHERE ID_desafio = $ID_desafio";

$result = $conn->query($sql);

if ($result === TRUE) {
?>
    <script>
        if (window.confirm("Deseja deletar este desafio?")) {
            window.location.href = "../userInteraction/perfil.php?NomeUsuario=<?php echo $NomeUsuario ?>";
        } else {
            window.history.back();
        }
    </script>
<?php
} else {
?>
    <script>
        window.history.back();
    </script>
<?php
}
?>
