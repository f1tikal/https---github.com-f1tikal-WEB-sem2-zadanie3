<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Подключение к БД (скопируйте ваши параметры)
$db_host = 'localhost';
$db_name = 'u82089';
$db_user = 'u82089';
$db_pass = '4044723';

// Проверяем, что пришли POST-данные
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Этот скрипт должен быть вызван методом POST из формы.";
    exit;
}

// Выводим всё, что пришло из формы
echo "<h2>Полученные данные (\$_POST):</h2>";
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Проверка валидации (скопируйте из вашего process.php код валидации)
$errors = [];
$full_name = trim($_POST['full_name'] ?? '');
if (preg_match('/^[a-zA-Zа-яА-ЯёЁ\s\-]+$/u', $full_name) === 0 || strlen($full_name) > 150) {
    $errors['full_name'] = 'ФИО должно содержать только буквы, пробелы и дефисы, и быть не длиннее 150 символов.';
}
// ... добавьте остальные проверки, как в process.php

if (!empty($errors)) {
    echo "<h2>Ошибки валидации:</h2><pre>";
    print_r($errors);
    echo "</pre>";
    exit;
}

// Если валидация пройдена, пробуем вставить в БД
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->beginTransaction();
    
    $sql = "INSERT INTO vinokurov_applications (full_name, phone, email, birth_date, gender, bio, agreement) 
            VALUES (:full_name, :phone, :email, :birth_date, :gender, :bio, :agreement)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':full_name' => $full_name,
        ':phone' => $_POST['phone'],
        ':email' => $_POST['email'],
        ':birth_date' => $_POST['birth_date'],
        ':gender' => $_POST['gender'],
        ':bio' => $_POST['bio'],
        ':agreement' => isset($_POST['agreement']) ? 1 : 0,
    ]);
    
    $user_id = $pdo->lastInsertId();
    
    // Вставка языков
    $languages = $_POST['languages'] ?? [];
    $sql_lang = "INSERT INTO vinokurov_application_languages (application_id, language_id) VALUES (:app_id, :lang_id)";
    $stmt_lang = $pdo->prepare($sql_lang);
    foreach ($languages as $lang_id) {
        $stmt_lang->execute([
            ':app_id' => $user_id,
            ':lang_id' => $lang_id,
        ]);
    }
    
    $pdo->commit();
    header('Location: form.php?status=success');
    exit;
    
} catch (PDOException $e) {
    $pdo->rollBack();
    header('Location: form.php?status=error');
    exit;
}