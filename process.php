<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$db_host = 'localhost';
$db_name = 'u82089'; 
$db_user = 'u82089'; 
$db_pass = '4044723'; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.html');
    exit;
}

$errors = [];
$full_name = trim($_POST['full_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$birth_date = $_POST['birth_date'] ?? '';
$gender = $_POST['gender'] ?? '';
$languages = $_POST['languages'] ?? [];
$bio = trim($_POST['bio'] ?? '');
$agreement = isset($_POST['agreement']) ? 1 : 0;

if (preg_match('/^[a-zA-Zа-яА-ЯёЁ\s\-]+$/u', $full_name) === 0 || strlen($full_name) > 150) {
    $errors['full_name'] = 'ФИО должно содержать только буквы, пробелы и дефисы, и быть не длиннее 150 символов.';
}

if (empty($phone)) {
    $errors['phone'] = 'Телефон не может быть пустым.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Введите корректный email адрес.';
}

$date = DateTime::createFromFormat('Y-m-d', $birth_date);
if (!$date || $date->format('Y-m-d') !== $birth_date) {
    $errors['birth_date'] = 'Введите корректную дату рождения.';
}

$allowed_genders = ['male', 'female', 'other'];
if (!in_array($gender, $allowed_genders)) {
    $errors['gender'] = 'Выберите корректный пол.';
}

$allowed_language_ids = range(1, 12);
if (empty($languages)) {
    $errors['languages'] = 'Выберите хотя бы один язык программирования.';
} else {
    foreach ($languages as $lang_id) {
        if (!in_array((int)$lang_id, $allowed_language_ids)) {
            $errors['languages'] = 'Выбран недопустимый язык программирования.';
            break;
        }
    }
}

if (empty($bio)) {
    $errors['bio'] = 'Биография не может быть пустой.';
}

if ($agreement !== 1) {
    $errors['agreement'] = 'Вы должны подтвердить согласие с контрактом.';
}

if (!empty($errors)) {
    header('Location: form.html?status=error');
    exit;
}

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $pdo->beginTransaction();
    
    $sql = "INSERT INTO vinokurov_applications (full_name, phone, email, birth_date, gender, bio, agreement) 
            VALUES (:full_name, :phone, :email, :birth_date, :gender, :bio, :agreement)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':full_name' => $full_name,
        ':phone' => $phone,
        ':email' => $email,
        ':birth_date' => $birth_date,
        ':gender' => $gender,
        ':bio' => $bio,
        ':agreement' => $agreement,
    ]);
    
    $user_id = $pdo->lastInsertId();
    
    $sql_lang = "INSERT INTO vinokurov_application_languages (user_id, language_id) VALUES (:user_id, :language_id)";
    $stmt_lang = $pdo->prepare($sql_lang);
    
    foreach ($languages as $lang_id) {
        $stmt_lang->execute([
            ':user_id' => $user_id,
            ':language_id' => $lang_id,
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
?>