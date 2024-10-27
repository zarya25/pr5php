<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, category, price) VALUES ('$name', '$category', '$price')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Добавить товар</h1>
    <form method="POST">
        <input type="text" name="name" placeholder="Название" required>
        <input type="text" name="category" placeholder="Категория" required>
        <input type="number" name="price" placeholder="Цена" step="0.01" required>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>
