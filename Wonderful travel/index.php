<?php
include './Controlador/controlador.php';
session_start();

try {
    $connexio = conectarBD();
    //Modificació d'atributs necessària per al funcionament del codi, això fa que quan insertem el numero del limit i el offset a la consulta s'insereixi com a int i no com a string
    $connexio->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
require "./Vista/index.vista.php";

