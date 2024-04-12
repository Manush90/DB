<?php
include 'db_connection.php';

// Assicurati che il modulo sia stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal modulo
    $pizza_name = $_POST['pizza_name'];
    $pizza_price = $_POST['pizza_price'];
    $pizza_ingredientes = $_POST['pizza_ingredientes'];

    // Inserisci la nuova pizza nel database
    $stmt = $pdo->prepare("INSERT INTO dishes (name, price, ingredientes) VALUES (:pizza_name, :pizza_price, :pizza_ingredientes)");
    $stmt->execute([
        'pizza_name' => $pizza_name,
        'pizza_price' => $pizza_price,
        'pizza_ingredientes' => $pizza_ingredientes
    ]);

    // Reindirizza alla pagina principale
    header('Location: index.php');
}
?>

