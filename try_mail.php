<?php
require 'ClassAutoLoad.php';

$mailCnt = [
    'name_from' => 'BBIT Systems Admin',
    'mail_from' => 'museo.aaron141@gmail.com',
    'name_to' => 'Lemon',
    'mail_to' => 'gaminglemon141@gmail.com',
    'subject' => 'Welcome to BBIT Enterprise',
    'body' => 'This is a new semester <b>Let\'s get started!</b>'
];

$ObjSendMail->Send_Mail($conf, $mailCnt);
