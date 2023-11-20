<?php
$NomeUsuario = $_GET["NomeUsuario"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Criar Desafio</title>
</head>

<body>
    <style>
        option {
            color: black;
        }
    </style>
    <div class="navbar">
        <div class="navright">
            <a href="../home.php"><img id="logo" src="../img/cee8b1f2-8256-41cf-95f0-58bb48d144e4.jpg" style="width: 300px;"></a>
        </div>
        <div class="navleft">

        </div>
    </div>
    <h2 style="text-align: center;">CRIAR DESAFIO</h2>
    <form action="../linksBd/link_criar.php?NomeUsuario=<?php echo $NomeUsuario ?>" method="post">
        <div class="box-tot" style="margin-top: 30px;">
            <div class="box-ajust">
                <div class="box-right">
                    Nome:
                </div>
                <div class="box-left">
                    <input type="text" name="nome" placeholder="Digite o nome do desafio">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Dificuldade:
                </div>
                <div class="box-left">
                    <input type="text" name="dif" placeholder="Digite a dificuldade do desafio">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Descrição:
                </div>
                <div class="box-left">
                    <input type="text" name="desc" placeholder="Digite a descrição do desafio">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Periodização:
                </div>
                <div class="box-left">
                    <input type="text" name="peri" placeholder="Digite a periodização do desafio">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Tipo:
                </div>
                <div class="box-left">
                    <select name="tipo" style="width: 685px;height:35px; color:black;border-radius:15px;">
                        <option value="Cardio">cardio</option>
                        <option value="Treino">treino</option>
                        <option value="Flexibilidade">flexibilidade</option>
                        <option value="Alimentação">alimentação</option>
                    </select>
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Pontuação:
                </div>
                <div class="box-left">
                    <input type="number" name="pont" placeholder="Digite a pontuação do desafio">
                </div>
            </div>
            <div class="box-ajust">
                <div class="box-right">
                    Status:
                </div>
                <div class="box-left">
                    <input type="text" name="stats" placeholder="Digite o status do desafio">
                </div>
            </div><br>
            <a href=""><button value="salvar" id="save">Criar</button><br></a>
        </div>
    </form>
    <script>
    </script>
</body>

</html>