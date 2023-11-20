<?php
include("../connection.php");

session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];

$sql_cliente = "DELETE FROM Cliente WHERE NomeUsuario = '$NomeUsuario'";
$result_cliente = $conn->query($sql_cliente);

if ($result_cliente) {
    echo '<script>';
    echo 'var confirmar = confirm("Deseja apagar o perfil?");';
    echo 'if (confirmar) {';
    echo 'window.location.href = "../home.php";';
    echo '} else {';
    echo 'history.go(-1);';
    echo '}';
    echo '</script>';
    
    session_destroy();
} else {
    $sql_profissional = "DELETE FROM Profissionais WHERE NomeUsuario = '$NomeUsuario'";
    $result_profissional = $conn->query($sql_profissional);

    if ($result_profissional) {
        echo '<script>';
        echo 'var confirmar = confirm("Deseja apagar o perfil?");';
        echo 'if (confirmar) {';
        echo 'window.location.href = "../home.php";';
        echo '} else {';
        echo 'history.go(-1);';
        echo '}';
        echo '</script>';
        
        session_destroy();
    }
}
?>
