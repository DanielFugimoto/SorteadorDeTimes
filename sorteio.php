<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sorteador</title>
</head>

<body>
    <h1>Sorteio de Times</h1>
    <form action="index.php" method="post">
        <button type="submit">Mudar Jogadores</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $times = $_POST["times"];
        $pessoas = json_decode($_POST["pessoas"], true);

        $totalPessoas = count($pessoas);
        $pessoasPorTime = ceil($totalPessoas / $times);

        usort($pessoas, function ($a, $b) {
            return $b["nota tática"] + $b["nota técnica"] + $b["nota física"] - ($a["nota tática"] + $a["nota técnica"] + $a["nota física"]);
        });

        $timesArray = array_fill(0, $times, []);
        $somaNotas = array_fill(0, $times, 0);

        foreach ($pessoas as $pessoa) {
            $menorSoma = min($somaNotas);
            $menorTime = array_search($menorSoma, $somaNotas);

            $timesArray[$menorTime][] = $pessoa;
            $somaNotas[$menorTime] += $pessoa["nota tática"] + $pessoa["nota técnica"] + $pessoa["nota física"];
        }

        for ($i = 0; $i < count($timesArray); $i++) {
            echo "<h2>Time " . ($i + 1) . ":</h2>";

            foreach ($timesArray[$i] as $pessoa) {
                echo "<p>" . $pessoa["nome"] . "</p>";
            }

            echo "<p>Soma das Notas Totais: " . $somaNotas[$i] . "</p>";
        }
    }
    ?>

</body>

</html>