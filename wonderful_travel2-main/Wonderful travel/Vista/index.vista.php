<!doctype html>
<html lang="ca">
<head>
    <title>Wonderful Travel</title>
    <meta charset="UTF-8" />   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Vista/Estils/vista_rellotje_analogic.css">
    <link rel="stylesheet" href="./Vista/Estils/estil.css">
    <script defer src="./Model/rellotge.js"></script>
</head>
<body onload="init()">
    <div class="container">
        <header>Wonderful travel</header>
        <canvas id="canvas" width="200" height="200"></canvas>
        <form id="viatgeForm" method="POST">
            <div class="form-group">
                <label for="continent">Continent:</label>
                <select id="continent" name="continent" class="form-control">
                    <option value="">Selecciona un continent</option>
                    <?php foreach ($continents as $continent): ?>
                        <option value="<?= $continent['continent'] ?>" <?= isset($_COOKIE['selectedContinent']) && $_COOKIE['selectedContinent'] == $continent['continent'] ? 'selected' : '' ?>><?= $continent['continent'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pais">País:</label>
                <select id="pais" name="pais" class="form-control">
                    <option value="">Selecciona un país</option>
                    <?php foreach ($paisos as $pais): ?>
                        <option value="<?= $pais['pais'] ?>"><?= $pais['pais'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dataViatge">Data del viatge:</label>
                <input type="date" id="dataViatge" name="dataViatge" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomTitular">Nom del titular:</label>
                <input type="text" id="nomTitular" name="nomTitular" class="form-control">
            </div>
            <div class="form-group">
                <label for="preu">Preu:</label>
                <input type="text" id="preu" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="imatge">Imatge:</label>
                <img id="imatge" src="./Vista/img/placeholder.webp" alt="Imatge del país" class="img-fluid">
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
        <div id="reserves">
            <!-- Llista de reserves -->
        </div>
    </div>
    <script>
        document.getElementById('continent').addEventListener('change', function() {
            document.cookie = "selectedContinent=" + this.value + "; path=/";
            this.form.submit();
        });

        document.getElementById('pais').addEventListener('change', function() {
            const pais = this.value;
            fetch(`./Controlador/controlador.php?pais=${pais}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('preu').value = data.preu;
                    const imatgeSrc = data.imatge ? data.imatge : './Vista/img/placeholder.webp';
                    document.getElementById('imatge').src = imatgeSrc;
                });
        });
    </script>
</body>
</html>