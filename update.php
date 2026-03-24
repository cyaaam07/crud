<?php
require 'config.php';

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM artists WHERE id = :id");
$stmt->execute([':id' => $id]);
$artist = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("UPDATE artists SET name=:name, genre=:genre, debut_year=:debut_year WHERE id=:id");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':genre' => $_POST['genre'],
        ':debut_year' => $_POST['debut_year'],
        ':id' => $id
    ]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Artist</title>
</head>
<body>
    <h1>Edit Artist</h1>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($artist['name']) ?>" required><br><br>
        <input type="text" name="genre" value="<?= htmlspecialchars($artist['genre']) ?>"><br><br>
        <input type="number" name="debut_year" value="<?= $artist['debut_year'] ?>"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>