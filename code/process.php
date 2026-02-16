<?php
session_start();

// получаем данные из фромы
$username = htmlspecialchars($_POST['student_name'] ?? '');
$age = htmlspecialchars($_POST['age'] ?? '');
$faculty = htmlspecialchars($_POST['faculty'] ?? '');
$education_type = htmlspecialchars($_POST['education_type'] ?? '');

// --- валидация
$errors = [];

if (empty($username)) {
    $errors[] = "Имя студента не может быть пустым.";
}

if (empty($age) || !is_numeric($age) || $age < 16) {
    $errors[] = "Возраст должен быть числом не меньше 16 лет.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}
//  валидация ---

// сохраняем основные данные в сессию
$_SESSION['username'] = $username;
$_SESSION['age'] = $age;

// Формат: Имя;Возраст;Факультет;Форма
$line = $username . ";" . $age . ";" . $faculty . ";" . $education_type . "\n";
file_put_contents("data.txt", $line, FILE_APPEND);

// на главную страницу
header("Location: index.php");
exit();