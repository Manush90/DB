<?php
include 'db_connection.php';

$delete_pizza_id = $_POST['delete_pizza_id'];

$stmt = $pdo->prepare("DELETE FROM dishes WHERE id = ?");
$stmt->execute([$delete_pizza_id]);

header('Location: index.php');
?>
