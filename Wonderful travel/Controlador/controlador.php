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

?>