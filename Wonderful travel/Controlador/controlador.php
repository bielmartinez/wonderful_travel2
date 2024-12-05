<?php
//Funcio per conectar amb la BD mitjançant PDO
function conectarBD()
{
    $connexio = new PDO('mysql:host=localhost;dbname=wonderful_travel', 'root', '');
    return $connexio;
}

//Funcio per evitar injeccio de codi als formularis
function arreglarDades($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function selectContinent()
{
    $connexio = conectarBD();
    $consulta = $connexio->prepare('SELECT DISTINCT continent FROM destins');
    $consulta->execute();
    $continent = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $continent;
}

function selectPais($continent)
{
    $connexio = conectarBD();
    $consulta = $connexio->prepare('SELECT pais FROM destins WHERE continent = :continent');
    $consulta->bindParam(':continent', $continent, PDO::PARAM_STR);
    $consulta->execute();
    $pais = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $pais;
}

function selectPreu($pais)
{
    $connexio = conectarBD();
    $consulta = $connexio->prepare('SELECT preu FROM destins WHERE pais = :pais');
    $consulta->bindParam(':pais', $pais, PDO::PARAM_STR);
    $consulta->execute();
    $preu = $consulta->fetch(PDO::FETCH_ASSOC);
    return $preu;
}

function selectImatge($pais)
{
    $connexio = conectarBD();
    $consulta = $connexio->prepare('SELECT foto FROM destins WHERE pais = :pais');
    $consulta->bindParam(':pais', $pais, PDO::PARAM_STR);
    $consulta->execute();
    $imatge = $consulta->fetch(PDO::FETCH_ASSOC);
    return $imatge;
}

if (isset($_GET['continent'])) {
    $continent = arreglarDades($_GET['continent']);
    $paisos = selectPais($continent);
    echo json_encode($paisos);
}

if (isset($_GET['pais'])) {
    $pais = arreglarDades($_GET['pais']);
    $preu = selectPreu($pais);
    $imatge = selectImatge($pais);
    echo json_encode(['preu' => $preu['preu'], 'imatge' => $imatge['foto']]);
}
?>