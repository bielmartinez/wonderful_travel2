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
        <form id="viatgeForm">
            <div class="form-group">
                <label for="continent">Continent:</label>
                <select id="continent" class="form-control">
                    <option value="">Selecciona un continent</option>
                    <!-- Opcions de continents -->
                </select>
            </div>
            <div class="form-group">
                <label for="pais">País:</label>
                <select id="pais" class="form-control">
                    <option value="">Selecciona un país</option>
                    <!-- Opcions de països -->
                </select>
            </div>
            <div class="form-group">
                <label for="dataViatge">Data del viatge:</label>
                <input type="date" id="dataViatge" class="form-control">
            </div>
            <div class="form-group">
                <label for="preu">Preu:</label>
                <input type="text" id="preu" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="imatge">Imatge:</label>
                <img id="imatge" src="" alt="Imatge del país" class="img-fluid">
            </div>
            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
        <div id="reserves">
            <!-- Llista de reserves -->
        </div>
    </div>
</body>
</html>
