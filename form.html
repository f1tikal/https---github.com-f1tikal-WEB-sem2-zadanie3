<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Анкета разработчика – задание 3</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            padding: 30px 40px 40px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
            font-size: 15px;
        }

        .required:after {
            content: " *";
            color: #e74c3c;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }

        select[multiple] {
            min-height: 130px;
            background: #f9f9f9;
        }

        .radio-group {
            display: flex;
            gap: 20px;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 5px;
        }

        .radio-group label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-weight: normal;
            margin-bottom: 0;
            cursor: pointer;
        }

        .checkbox-group {
            margin: 20px 0;
            background: #f8f9ff;
            padding: 12px 15px;
            border-radius: 10px;
        }

        .checkbox-group label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            margin-bottom: 0;
            font-weight: normal;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .alert {
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 5px solid #28a745;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 5px solid #dc3545;
        }

        small {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
            display: block;
        }

        hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #eee;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            .radio-group {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>📝 Регистрационная анкета</h1>
    <div class="subtitle">Заполните форму, чтобы стать частью IT-сообщества</div>

    <!-- Блоки сообщений об успехе / ошибке (по параметрам GET) -->
    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] === 'success'): ?>
            <div class="alert alert-success">
                 Данные успешно сохранены! Спасибо за регистрацию.
            </div>
        <?php elseif ($_GET['status'] === 'error'): ?>
            <div class="alert alert-error">
                 Ошибка при сохранении. Проверьте правильность заполнения полей.
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <form action="process.php" method="POST">
        <!-- 1. ФИО -->
        <div class="form-group">
            <label for="full_name" class="required">ФИО</label>
            <input type="text" id="full_name" name="full_name" maxlength="150" required
                   placeholder="Иванов Иван Иванович">
            <small>Только буквы, пробелы и дефисы, не более 150 символов</small>
        </div>

        <!-- 2. Телефон -->
        <div class="form-group">
            <label for="phone" class="required">Телефон</label>
            <input type="tel" id="phone" name="phone" required placeholder="+7 (123) 456-78-90">
        </div>

        <!-- 3. Email -->
        <div class="form-group">
            <label for="email" class="required">E-mail</label>
            <input type="email" id="email" name="email" required placeholder="example@domain.com">
        </div>

        <!-- 4. Дата рождения -->
        <div class="form-group">
            <label for="birth_date" class="required">Дата рождения</label>
            <input type="date" id="birth_date" name="birth_date" required>
        </div>

        <!-- 5. Пол (радиокнопки) -->
        <div class="form-group">
            <label class="required">Пол</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="male" required> Мужской</label>
                <label><input type="radio" name="gender" value="female"> Женский</label>
                <label><input type="radio" name="gender" value="other"> Другой</label>
            </div>
        </div>

        <!-- 6. Любимый язык программирования (множественный выбор) -->
        <div class="form-group">
            <label for="languages" class="required">Любимый язык программирования</label>
            <select name="languages[]" id="languages" multiple required>
                <option value="1">Pascal</option>
                <option value="2">C</option>
                <option value="3">C++</option>
                <option value="4">JavaScript</option>
                <option value="5">PHP</option>
                <option value="6">Python</option>
                <option value="7">Java</option>
                <option value="8">Haskell</option>
                <option value="9">Clojure</option>
                <option value="10">Prolog</option>
                <option value="11">Scala</option>
                <option value="12">Go</option>
            </select>
            <small>Удерживайте Ctrl (Cmd на Mac) для выбора нескольких языков</small>
        </div>

        <!-- 7. Биография -->
        <div class="form-group">
            <label for="bio" class="required">Биография</label>
            <textarea id="bio" name="bio" rows="5" required placeholder="Расскажите немного о себе..."></textarea>
        </div>

        <!-- 8. Согласие с контрактом -->
        <div class="checkbox-group">
            <label>
                <input type="checkbox" name="agreement" value="1" required>
                Я ознакомлен(а) с контрактом и согласен(на)
            </label>
        </div>

        <!-- 9. Кнопка Сохранить -->
        <button type="submit" class="btn">💾 Сохранить</button>
    </form>
</div>
</body>
</html>