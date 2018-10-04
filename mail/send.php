<?php

mb_send_mail('benibana2001@gmail.com',
    'test_subject',
    'test_message',
    $headers);

$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();