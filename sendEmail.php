<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Подключение PHPMailer
require '../vendor/autoload.php';

// Получение данных из POST запроса
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'];

// Создание экземпляра PHPMailer
$mail = new PHPMailer(true);

try {
    // Настройка SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.beget.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'alina_kovaleva_30@rambler.ru';
    $mail->Password = '7gPWn7mp';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 25;

    // Включить отладку
    $mail->SMTPDebug = 2; 
    $mail->Debugoutput = 'html';

    // Установка параметров письма
    $mail->setFrom('alina_kovaleva_30@rambler.ru', 'Сайт Фитнес');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Чек';
    $mail->Body    = 'Чек';

    // Отправка письма
    $mail->send();
    echo 'Email успешно отправлен!';
} catch (Exception $e) {
    echo "Ошибка при отправке письма: {$mail->ErrorInfo}";
}
?>
