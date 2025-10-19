<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="card shadow p-4 text-center">
        <?php
        // 1. Pegar data de nascimento
        $data_nascimento = $_POST['data_nascimento'];

        // Converter formato (ex: 1998-05-12 → 12/05)
        $data = DateTime::createFromFormat('Y-m-d', $data_nascimento);
        $data_formatada = $data->format('d/m');

        // 2. Carregar arquivo XML
        $signos = simplexml_load_file("signos.xml");

        $signo_encontrado = null;

        // 3. Verificar em qual faixa a data se encaixa
        foreach ($signos->signo as $signo) {
            $inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
            $fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
            $nasc = DateTime::createFromFormat('d/m', $data_formatada);

            // Ajustar para quando o signo cruza o ano (ex: Capricórnio)
            if ($fim < $inicio) {
                if ($nasc >= $inicio || $nasc <= $fim) {
                    $signo_encontrado = $signo;
                    break;
                }
            } else {
                if ($nasc >= $inicio && $nasc <= $fim) {
                    $signo_encontrado = $signo;
                    break;
                }
            }
        }

        // 4. Exibir resultado
        if ($signo_encontrado) {
            echo "<h2>Seu signo é <strong>{$signo_encontrado->signoNome}</strong></h2>";
            echo "<p class='mt-3'>{$signo_encontrado->descricao}</p>";
        } else {
            echo "<p>Não foi possível determinar o signo.</p>";
        }
        ?>
        <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
    </div>
</div>

</body>
</html>
