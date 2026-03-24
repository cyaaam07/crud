<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $genre = $_POST['genre'];
    $debut_year = $_POST['debut_year'];

    $stmt = $db->prepare("INSERT INTO artists (name, genre, debut_year) VALUES (:name, :genre, :debut_year)");
    $stmt->execute([
        ':name' => $name,
        ':genre' => $genre,
        ':debut_year' => $debut_year
    ]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Artist</title>
</head>
<body>
    <h1>Add Artist</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Artist Name" required><br><br>
        <input type="text" name="genre" placeholder="Genre"><br><br>
        <input type="number" name="debut_year" placeholder="Debut Year"><br><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>