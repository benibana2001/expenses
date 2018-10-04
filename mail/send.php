<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$send_mail = mb_send_mail('benibana2001@gmail.com',
    'test_subject',
    'test_message',
    $from);

$from  = "From: my-mail@example.com\r\n";
$from .= "Return-Path: my-mail@example.com";

//メールの送信に問題ないかチェック
if ($send_mail) {
    echo "ok";
} else {
    echo "no";
}