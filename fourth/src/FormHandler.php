
<?php


class FormHandler
{
  public function handle(array $data): string
  {
    $name = trim($data['name'] ?? '');
    $gender = $data['gender'] ?? '';
    $age = (int)($data['age'] ?? -1);

    $this->validate($name, $gender, $age);

    $timeGreeting = $this->getTimeGreeting();
    $ageCategory = $this->getAgeCategory($age, $gender);
    $nameFormatted = htmlspecialchars($name);

    return "{$timeGreeting}, {$ageCategory} {$nameFormatted}!";
  }

  private function validate(string $name, string $gender, int $age): void
  {
    if (!$name || !$gender || $age < 0) {
      throw new Exception('Все поля должны быть заполнены корректно.');
    }

    if (!preg_match('/^[а-яА-ЯёЁa-zA-Z]+$/u', $name)) {
      throw new Exception('Имя может содержать только буквы, без цифр и символов.');
    }

    if (!in_array($gender, ['male', 'female'], true)) {
      throw new Exception('Неверно указан пол.');
    }
  }

  private function getTimeGreeting(): string
  {
    $hour = (int)date('H');
    if ($hour >= 5 && $hour < 12) return 'Доброе утро';
    if ($hour >= 12 && $hour < 18) return 'Добрый день';
    if ($hour >= 18 && $hour < 23) return 'Добрый вечер';
    return 'Доброй ночи';
  }

  private function getAgeCategory(int $age, string $gender): string
  {
    $isFemale = $gender === 'female';

    if ($age < 12) {
      return $isFemale ? 'девочка' : 'мальчик';
    }

    if ($age < 30) {
      return $isFemale ? 'девушка' : 'молодой человек';
    }

    if ($age < 60) {
      return $isFemale ? 'женщина' : 'мужчина';
    }
    if ($age < 120) {
      return $isFemale ? 'бабушка' : 'дедушка';
    }
    if ($age < 48000) {
      return $isFemale ? 'великая бабушка' : 'великий дедушка';
    }
    return 'о Великий Император человечества';
  }
}
