<?php
require 'config.php';
require_once 'style.css';


// Haal alle artiesten op
$stmt = $db->query("SELECT * FROM artists");
$artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Artists CRUD</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <h1>Artists</h1>
    <a href="create.php">Add Artist</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Genre</th>
            <th>Debut Year</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($artists as $artist): ?>
        <tr>
            <td><?= $artist['id'] ?></td>
            <td><?= htmlspecialchars($artist['name']) ?></td>
            <td><?= htmlspecialchars($artist['genre']) ?></td>
            <td><?= $artist['debut_year'] ?></td>
            <td>
                <a href="update.php?id=<?= $artist['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $artist['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>