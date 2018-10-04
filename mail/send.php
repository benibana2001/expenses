<?php

mb_send_mail('benibana2001@gmail.com',
    'test_subject',
    'test_message',
    $from);

$from  = "From: my-mail@example.com\r\n";
$from .= "Return-Path: my-mail@example.com";