<?php
include("../connection.php");

session_start();

$NomeUsuario = $_SESSION["NomeUsuario"];
$ID_desafio = $_SESSION["fkID"];
$NomeDesafio = $_SESSION["NomeDesafio"];
$TipoDesafio = $_SESSION["TipoDesafio"];
$NomeProf = $_SESSION["fkPR"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Finalizar desafio</title>
</head>

<body>
    <div class="navbar">
        <div class="navright">
            <a href=""><img id="logo" src="../img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
    </div>
    <h2 style="text-align: center;">FINALIZAR DESAFIO</h2>

    <form action="../linksBd/link_realiza_final.php" method="post">
        <div class="box-tot" style="margin-top: 30px;">
            <h2>Digite a hora e o dia em que terminou o desafio</h2>
            <div class="box-ajust">
                <div class="box-right">
                    Nome do Desafio:
                </div>
                <div class="box-left">
                    <input type="text" placeholder="<?php echo "$NomeDesafio" ?>" disabled>
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Tipo do desafio:
                </div>
                <div class="box-left">
                    <input type="text" placeholder="<?php echo $TipoDesafio ?>" disabled>
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Criador do desafio:
                </div>
                <div class="box-left">
                    <input type="text" placeholder="<?php echo $NomeProf ?>" disabled>
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Hora que finalizou:
                </div>
                <div class="box-left">
                    <input type="text" id="hora" name="hora" maxlength="8">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Data que finalizou:
                </div>
                <div class="box-left">
                    <input type="text" id="data" name="data" maxlength="10">
                </div>
            </div>
            <a href=""><button value="salvar" id="save">Finalizar</button><br></a>
        </div>
    </form>
    <script>
        document.getElementById('hora').addEventListener('input', function(e) {
            let inputValue = e.target.value;

            inputValue = inputValue.replace(/\D/g, '');

            if (inputValue.length >= 2 && inputValue.length < 5) {
                inputValue = inputValue.substring(0, 2) + ':' + inputValue.substring(2);
            } else if (inputValue.length >= 5) {
                inputValue = inputValue.substring(0, 2) + ':' + inputValue.substring(2, 4) + ':' + inputValue.substring(4, 6);
            }
            e.target.value = inputValue;
        });

        document.getElementById('data').addEventListener('input', function(e) {
            let inputValue = e.target.value;

            inputValue = inputValue.replace(/\D/g, '');

            if (inputValue.length >= 4 && inputValue.length < 7) {
                inputValue = inputValue.substring(0, 4) + '-' + inputValue.substring(4);
            } else if (inputValue.length >= 7) {
                inputValue = inputValue.substring(0, 4) + '-' + inputValue.substring(4, 6) + '-' + inputValue.substring(6, 8);
            }
            e.target.value = inputValue;
        });
    </script>
</body>

</html>