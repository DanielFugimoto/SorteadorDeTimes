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


    <body>
        <?php
        $pessoas = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomes = $_POST["nome"];
            $notaTa = $_POST["notaTa"];
            $notaTe = $_POST["notaTe"];
            $notaF = $_POST["notaF"];

            for ($i = 0; $i < count($nomes); $i++) {
                $nome = $nomes[$i];
                $notaTat = $notaTa[$i];
                $notaTec = $notaTe[$i];
                $notaFi = $notaF[$i];

                $pessoas[] = [
                    "nome" => $nome,
                    "nota tática" => $notaTat,
                    "nota técnica" => $notaTec,
                    "nota física" => $notaFi
                ];
            }

            echo "<p>Pessoas adicionadas com sucesso!</p>";
        }
        ?>

        <h2>Pessoas Adicionadas:</h2>
        <?php foreach ($pessoas as $pessoa) : ?>
            <p>
                Nome: <?php echo $pessoa["nome"]; ?><br>
                Nota Total: <?php echo $pessoa["nota tática"] + $pessoa["nota técnica"] + $pessoa["nota física"]; ?>
            </p>
        <?php endforeach; ?>

        <form action="sorteio.php" method="post">
            <input type="hidden" name="pessoas" value="<?php echo htmlspecialchars(json_encode($pessoas)); ?>">

            <label for="times">Times:</label>
            <select id="times" name="times" required>
                <option value="2">2 Times</option>
                <option value="3">3 Times</option>
                <option value="4">4 Times</option>
                <option value="5">5 Times</option>
                <option value="6">6 Times</option>
            </select>

            <button type="submit">Sortear Times</button>
        </form>
    </body>

</html>