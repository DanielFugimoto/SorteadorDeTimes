<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Sorteador de Times</h1>

    <form action="processamento.php" method="post" id="form-jogadores">
        <div id="cadastro">
            <div class="pessoas">
                <label for="nome">Nome
                    <input type="text" name="nome[]" required>
                </label>

                <label for="notaTa">Nota tática (0-2):
                    <input type="range" min="0" max="2" step="1" value="0" name="notaTa[]" required>
                </label>

                <label for="notaTe">Nota técnica (0-3):
                    <input type="range" min="0" max="3" step="1" value="0" name="notaTe[]" required>
                </label>

                <label for="notaF">Nota física (0-5):
                    <input type="range" min="0" max="5" step="1" value="0" name="notaF[]" required>
                </label>

                <button onclick="removerPessoa(this.parentNode)">Remover</button>
            </div>
        </div>

        <button type="button" onclick="adicionarPessoa()">Adicionar Pessoa</button>
        <button type="submit">Sortear Times</button>
    </form>

    <script>
        function adicionarPessoa() {
            let container = document.getElementById("cadastro");
            let pessoas = document.getElementsByClassName("pessoas");

            if (pessoas.length % 4 === 0) {
                let novaLinha = document.createElement("div");
                novaLinha.className = "linha";
                container.appendChild(novaLinha);
                container = novaLinha;
            }

            let novaPessoa = document.createElement("div");
            novaPessoa.className = "pessoas";

            novaPessoa.innerHTML = `
                <label for="nome">Nome
                    <input type="text" name="nome[]" required>
                </label>

                <label for="notaTa">Nota tática (0-2):
                    <input type="range" min="0" max="2" step="1" value="0" name="notaTa[]" required>
                </label>

                <label for="notaTe">Nota técnica (0-3):
                    <input type="range" min="0" max="3" step="1" value="0" name="notaTe[]" required>
                </label>

                <label for="notaF">Nota física (0-5):
                    <input type="range" min="0" max="5" step="1" value="0" name="notaF[]" required>
                </label>

                <button onclick="removerPessoa(this.parentNode)">Remover</button>
            `;

            container.appendChild(novaPessoa);
        }

        function removerPessoa(pessoas) {
            const container = document.getElementById("cadastro");
            container.removeChild(pessoas);
        }
    </script>

</body>

</html>