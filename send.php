<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Проверка на заполненность
    if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {

        // Заголовки письма
        $to = "Tursunov1020@icloud.com"; // Замените на ваш email
        $email_subject = "Новое сообщение: $subject";
        $email_body = "Вы получили новое сообщение от $name.\n\n".
                      "Email: $email\n\n".
                      "Сообщение:\n$message";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Отправка письма
        if(mail($to, $email_subject, $email_body, $headers)) {
            // Перенаправление на страницу благодарности
            header("Location: thank_you.html");
            exit();
        } else {
            echo "Ошибка при отправке сообщения.";
        }
    } else {
        echo "Пожалуйста, заполните все поля.";
    }
} else {
    header("Location: contact.html");
    exit();
}
?>
