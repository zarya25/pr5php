<?php
include 'db.php';

$query = "SELECT * FROM products";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query .= " WHERE name LIKE '%$search%'";
}

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query .= (strpos($query, 'WHERE') === false ? ' WHERE ' : ' AND ') . "category='$category'";
}

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Каталог товаров</h1>
    
    <form method="GET">
        <input type="text" name="search" placeholder="Поиск...">
        <select name="category">
            <option value="">Все категории</option>
            <option value="Электроника">Электроника</option>
            <option value="Одежда">Одежда</option>
            <option value="Игрушки">Игрушки</option>
        </select>
        <button type="submit">Поиск</button>
    </form>

    <ul>
        <?php while ($product = $result->fetch_assoc()): ?>
            <li>
                <strong><?php echo $product['name']; ?></strong><br>
                Категория: <?php echo $product['category']; ?><br>
                Цена: <?php echo $product['price']; ?> руб.
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
