<?php
include 'db_connection.php';

$edit_pizza_id = $_POST['edit_pizza_id'];
$edit_pizza_name = $_POST['edit_pizza_name'];

$stmt = $pdo->prepare("UPDATE dishes SET name = :edit_pizza_name  WHERE id = :edit_pizza_id");
$stmt->execute([
    'edit_pizza_id' => $edit_pizza_id,
    'edit_pizza_name' => $edit_pizza_name
]);

header('Location: index.php');
?>
