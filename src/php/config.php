<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/phpmailer/phpmailer.php');
   
    const SENDER = 'example@example.ru'; //откуда
    const CATCHER = 'example@example.ru'; //куда
    const SUBJECT = 'Заявка с сайта';
    const CHARSET = 'UTF-8';
    