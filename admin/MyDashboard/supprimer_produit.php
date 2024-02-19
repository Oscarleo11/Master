<?php
session_start();

require("../../Config/commandes.php");

if (!isset($_SESSION['xhTohTuzPbbsTtr71'])) {
    header("Location: ../../login.php");
    exit(); // Assure que le code s'arrête ici en cas de redirection
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $productId = $_GET["id"];

    // Appelle la fonction de suppression depuis ton fichier "commandes.php"
    supprimer($productId);

    // Redirige vers la page d'affichage des produits après la suppression
    header("Location: index.php");
    exit();
} else {
    // Redirection si la méthode de la requête n'est pas GET ou si l'ID n'est pas défini
    header("Location: index.php");
    exit();
}
?>
