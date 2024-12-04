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
    $consulta = $connexio->prepare('SELECT DISTINCT continent FROM paisos');
    $consulta->execute();
    $continent = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $continent;
}

function selectPais($continent)
{
    $connexio = conectarBD();
    $consulta = $connexio->prepare('SELECT nom FROM paisos WHERE continent = :continent');
    $consulta->bindParam(':continent', $continent, PDO::PARAM_STR);
    $consulta->execute();
    $pais = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $pais;
}

//Crea una funció per a seleccionar el preu del viatge segons el país que haguem seleccionat
function selectPreu($pais)
{
    $connexio = conectarBD();
    $consulta = $connexio->prepare('SELECT preu FROM paisos WHERE nom = :pais');
    $consulta->bindParam(':pais', $pais, PDO::PARAM_STR);
    $consulta->execute();
    $preu = $consulta->fetch(PDO::FETCH_ASSOC);
    return $preu;
}

//Crea una funció per a seleccionar la imatge del país que haguem seleccionat
function selectImatge($pais)
{
    $connexio = conectarBD();
    $consulta = $connexio->prepare('SELECT imatge FROM paisos WHERE nom = :pais');
    $consulta->bindParam(':pais', $pais, PDO::PARAM_STR);
    $consulta->execute();
    $imatge = $consulta->fetch(PDO::FETCH_ASSOC);
    return $imatge;
}
?>