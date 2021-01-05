<?php
$USR = "root";
$PORT = "3306";
$SRV = "localhost";
$MDP = "";
$BASE = "M3104";

$db = new PDO(
    //une seule ligne, sans espace
    "mysql:host=$SRV;port=$PORT;dbname=$BASE;charset=utf8",
    $USR,
    $MDP
);