
<?php
$cep = "";
$erro = "";
$endereco = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cep = $_POST["cep"] ?? "";

    // Remove espaços e caracteres que não sejam números
    $cep = preg_replace('/\D/', '', $cep);

    if (strlen($cep) !== 8) {
        $erro = "Digite um CEP válido com 8 números.";
    } else {
        $url = "https://viacep.com.br/ws/" . $cep . "/json/";

        // Realiza a requisição HTTP GET
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true
        ]);

        $resposta = curl_exec($curl);
        $statusHTTP = curl_getinfo(
            $curl,
            CURLINFO_HTTP_CODE
        );
        $erroCurl = curl_errno($curl);

        curl_close($curl);

        if ($erroCurl !== 0 || $resposta === false) {
            $erro = "Não foi possível consultar a API. Tente novamente.";
        } elseif ($statusHTTP !== 200) {
            $erro = "A API está indisponível no momento.";
        } else {
            // Converte o JSON em um objeto PHP
            $dados = json_decode($resposta);

            if (json_last_error() !== JSON_ERROR_NONE) {
                $erro = "Não foi possível interpretar a resposta da API.";
            } elseif (isset($dados->erro) && $dados->erro === true) {
                $erro = "CEP não encontrado. Verifique os números.";
            } else {
                $endereco = $dados;
            }
        }
    }
}

// Protege o conteúdo exibido na página
function escapar($valor) {
    return htmlspecialchars(
        (string) ($valor ?? ""),
        ENT_QUOTES,
        "UTF-8"
    );
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>BuscaCEP | Consulta de Endereços</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="topo">
        <a href="index.php" class="marca">Busca<span>CEP</span></a>
        <p>Consulta rápida de endereços</p>
    </header>

    <main class="container">
        <section class="apresentacao">
            <div class="icone">⌖</div>

            <p class="subtitulo">CONSULTA DE ENDEREÇOS</p>

            <h1>Encontre um endereço pelo CEP</h1>

            <p class="descricao">
                Informe o CEP desejado e descubra o endereço
                de forma rápida e gratuita.
            </p>

            <form method="POST" action="index.php"
                  class="formulario">
                <label for="cep">Digite o CEP</label>

                <div class="campo-consulta">
                    <input
                        type="text"
                        id="cep"
                        name="cep"
                        placeholder="Ex.: 01001-000"
                        maxlength="9"
                        inputmode="numeric"
                        pattern="[0-9]{5}-?[0-9]{3}"
                        value="<?= escapar($cep) ?>"
                        required
                    >

                    <button type="submit">Consultar</button>
                </div>

                <small>Digite os 8 números do CEP.</small>
            </form>
        </section>

        <?php if ($erro !== ""): ?>
            <section class="mensagem erro" role="alert">
                <strong>Não foi possível concluir a consulta.</strong>
                <p><?= escapar($erro) ?></p>
            </section>
        <?php endif; ?>

        <?php if ($endereco !== null): ?>
            <section class="resultado">
                <div class="resultado-topo">
                    <div>
                        <p class="subtitulo">RESULTADO DA CONSULTA</p>
                        <h2>Endereço encontrado!</h2>
                    </div>
                    <span class="selo">✓ Encontrado</span>
                </div>

                <div class="dados">
                    <div class="dado">
                        <span>CEP</span>
                        <strong><?= escapar($endereco->cep ?? $cep) ?></strong>
                    </div>

                    <div class="dado">
                        <span>Logradouro</span>
                        <strong><?= escapar($endereco->logradouro ?? "") ?: "Não informado" ?></strong>
                    </div>

                    <div class="dado">
                        <span>Bairro</span>
                        <strong><?= escapar($endereco->bairro ?? "") ?: "Não informado" ?></strong>
                    </div>

                    <div class="dado">
                        <span>Cidade</span>
                        <strong><?= escapar($endereco->localidade ?? "") ?: "Não informada" ?></strong>
                    </div>

                    <div class="dado">
                        <span>Estado</span>
                        <strong><?= escapar($endereco->uf ?? "") ?: "Não informado" ?></strong>
                    </div>

                    <div class="dado">
                        <span>DDD</span>
                        <strong><?= escapar($endereco->ddd ?? "") ?: "Não informado" ?></strong>
                    </div>
                </div>

                <p class="fonte">
                    Dados consultados por meio da API pública ViaCEP.
                </p>
            </section>
        <?php endif; ?>

        <section class="informacoes">
            <div class="info-item">
                <span>01</span>
                <div>
                    <strong>Informe o CEP</strong>
                    <p>Digite os oito números.</p>
                </div>
            </div>

            <div class="info-item">
                <span>02</span>
                <div>
                    <strong>Faça a consulta</strong>
                    <p>O sistema acessa a API.</p>
                </div>
            </div>

            <div class="info-item">
                <span>03</span>
                <div>
                    <strong>Veja o resultado</strong>
                    <p>O endereço aparece na tela.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>BuscaCEP &copy; <?= date("Y") ?> | Projeto acadêmico</p>
        <p>Desenvolvido com PHP e API ViaCEP</p>
    </footer>

    <script>
        const campoCep = document.getElementById("cep");

        campoCep.addEventListener("input", function () {
            let numeros = this.value.replace(/\D/g, "").slice(0, 8);

            if (numeros.length > 5) {
                numeros = numeros.slice(0, 5) + "-" + numeros.slice(5);
            }

            this.value = numeros;
        });
    </script>
</body>
</html>