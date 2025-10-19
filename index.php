<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Descubra o seu signo!</h3>
        <form method="POST" action="show_zodiac_sign.php">
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" class="form-control" name="data_nascimento" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Consultar</button>
        </form>
    </div>
</div>

</body>
</html>
