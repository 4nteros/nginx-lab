<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Все данные</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.6; }
        .entry { background: #f4f4f4; padding: 10px; margin-bottom: 10px; border-radius: 5px; border-left: 5px solid #3498db; }
        a { text-decoration: none; color: #3498db; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Все сохранённые данные (из файла):</h2>
    
    <?php
    $file = "data.txt";
    if(file_exists($file) && filesize($file) > 0){
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach($lines as $line){
            // Разбиваем строку: Имя;Возраст;Факультет;Форма
            $data = explode(";", $line);
            
            if(count($data) >= 2) {
                echo "<div class='entry'>";
                echo "<b>Студент:</b> " . htmlspecialchars($data[0]) . "<br>";
                echo "<b>Возраст:</b> " . htmlspecialchars($data[1]) . " лет<br>";
                echo "<b>Факультет:</b> " . htmlspecialchars($data[2] ?? 'не указан') . "<br>";
                echo "<b>Форма:</b> " . htmlspecialchars($data[3] ?? 'не указана');
                echo "</div>";
            }
        }
    } else {
        echo "<p>Данных пока нет.</p>";
    }
    ?>

    <hr>
    <a href="index.php">← На главную</a>
</body>
</html>