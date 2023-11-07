<?php
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    // Получите данные из формы
    $recipient_email = 'lifemaxjk@gmail.com';
    // Адрес электронной почты получателя
    $subject = 'Новое сообщение с формы сайта';
    // Тема вашего сообщения

    // Данные из формы
    $name = $_POST[ 'name' ];
    $phone = $_POST[ 'phone' ];
    $message = $_POST[ 'message' ];

    // Формируем текст сообщения
    $message_body = "Имя: $name\nТелефон: $phone\nСообщение: $message";

    // Отправка письма
    $result = mail( $recipient_email, $subject, $message_body );

    // Проверка на успешную отправку и вывод сообщения
    if ( $result ) {
        $response = array( 'status' => 'success', 'message' => 'Сообщение успешно отправлено!' );
    } else {
        $response = array( 'status' => 'error', 'message' => 'Ошибка при отправке сообщения.' );
    }

    // Возвращаем JSON-ответ
    header( 'Content-Type: application/json' );
    echo json_encode( $response );
}
?>