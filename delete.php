<?php
require 'config.php';

$id = $_GET['id'];
$stmt = $db->prepare("DELETE FROM artists WHERE id = :id");
$stmt->execute([':id' => $id]);

header('Location: index.php');
exit;
?>