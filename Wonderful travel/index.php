<?php
include './Controlador/controlador.php';

try {
    $connexio = conectarBD();
    $connexio->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$continents = selectContinent();
$paisos = [];
$selectedContinent = isset($_COOKIE['selectedContinent']) ? $_COOKIE['selectedContinent'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedContinent = $_POST['continent'];
    $paisos = selectPais($selectedContinent);
}

require "./Vista/index.vista.php";