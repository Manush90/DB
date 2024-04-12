<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Pizze</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <style>
        .pizza-card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h1>Ristoria Pizzorante</h1>
<div class="d-flex justify-content-center ">
    <form class="d-flex w-25 " role="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Cerca qui la tua pizza..." aria-label="Search">
        <button class="btn btn-outline-success mt-2" type="submit">Cerca Pizza</button>
    </form>
</div>

<h2>Aggiungi Pizza</h2>
    <form action="aggiungi_pizza.php" method="POST">
        <label for="pizza_name">Nome Pizza:</label>
        <input type="text" id="pizza_name" name="pizza_name" required>
        <label for="pizza_price">Prezzo Pizza:</label>
        <input type="number" id="pizza_price" name="pizza_price" step="0.01" required>
        <label for="pizza_ingredientes">Ingredienti:</label>
        <input type="text" id="pizza_ingredientes" name="pizza_ingredientes">
        <button type="submit">Aggiungi Pizza</button>
    </form>

    <h2>Modifica Pizza</h2>
    <form action="modifica_pizza.php" method="POST">
        <label for="edit_pizza_id">ID Pizza:</label>
        <input type="number" id="edit_pizza_id" name="edit_pizza_id" required>
        <label for="edit_pizza_name">Nuovo Nome Pizza:</label>
        <input type="text" id="edit_pizza_name" name="edit_pizza_name" required>
        <button type="submit" class="yelbut">Modifica Pizza</button>
    </form>

    <h2>Elimina Pizza</h2>
    <form action="elimina_pizza.php" method="POST">
        <label for="delete_pizza_id">ID Pizza:</label>
        <input type="number" id="delete_pizza_id" name="delete_pizza_id" required>
        <button type="submit" class="redbut">Elimina Pizza</button>
    </form>


<h2>Elenco Pizze</h2>

<?php
include 'db_connection.php';

$search = $_GET['search'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM dishes WHERE name LIKE ?");
$stmt->execute([
    "%$search%"
]);

if ($stmt->rowCount() > 0) {
    echo '<div class="row">';
    foreach ($stmt as $row) {
        echo '<div class="col-md-4">';
        echo '<div class="card pizza-card">';
        // echo '<img src="immagine_vuota.jpg" class="card-img-top" alt="Immagine Pizza">';
        echo '<div class="card-body">';
        echo "<h5 class='card-title'>$row[name]</h5>";
        echo "<p class='card-text'>Prezzo: $row[price] €</p>";

        if (!empty($row['ingredientes'])) {
            $ingredientes = explode(',', $row['ingredientes']);
            echo '<p class="card-text">Ingredienti: ' . implode(', ', $ingredientes) . '</p>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "<p>OPS !!! Non Abbiamo questa pizza ! '$search'.</p>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>






