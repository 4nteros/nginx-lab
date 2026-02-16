<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
</head>
<body>
    <h2>Результат регистрации:</h2>
<?php if(isset($_SESSION['errors'])): ?>
    <div style="background: #ffebee; color: #c62828; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <p><b>Ой! Исправьте ошибки:</b></p>
        <ul>
            <?php foreach($_SESSION['errors'] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>

    <?php if(isset($_SESSION['username'])): ?>
        <p>Данные из сессии:</p>
        <ul>
            <li>Имя: <?= $_SESSION['username'] ?></li>
            <li>Возраст: <?= $_SESSION['age'] ?></li>
        </ul>
    <?php else: ?>
        <p>Данных пока нет. Пожалуйста, заполните форму.</p>
    <?php endif; ?>

    <hr>
    
    <a href="form.html">Заполнить форму</a> | 
    <a href="view.php">Посмотреть все данные</a>
</body>
</html>