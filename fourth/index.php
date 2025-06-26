<?php
require_once 'src/FormHandler.php';


$handler = new FormHandler();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $message = $handler->handle($_POST);
  } catch (Exception $e) {
    $error = $e->getMessage();
  }
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Форма приветствия</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 40px;
    }

    form {
      max-width: 400px;
    }

    input,
    select {
      display: block;
      margin-bottom: 10px;
      padding: 5px;
      width: 100%;
    }

    button {
      padding: 10px 20px;
    }

    .message {
      margin-top: 20px;
      font-weight: bold;
      color: green;
    }

    .error {
      margin-top: 20px;
      font-weight: bold;
      color: red;
    }
  </style>
</head>

<body>
  <h1>Введите свои данные</h1>
  <form method="post">
    <label for="name">Имя:</label>
    <input type="text" name="name" id="name" required>

    <label for="gender">Пол:</label>
    <select name="gender" id="gender" required>
      <option value="male">Мужской</option>
      <option value="female">Женский</option>
    </select>

    <label for="age">Возраст:</label>
    <input type="number" name="age" id="age" min="0" required>

    <button type="submit">Отправить</button>
  </form>

  <?php if ($message): ?>
    <div class="message"><?= htmlspecialchars($message) ?></div>
  <?php elseif ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
</body>

</html>
