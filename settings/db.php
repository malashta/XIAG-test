<?php
/**
 * Created by Serge Tallerr on 26-Mar-16.
 * mail-to: malashta@gmail.com
 * Russia, Novosibirsk
 * https://vk.com/serge.tallerr
 * https://ru.linkedin.com/in/tallerr
 * https://facebook.com/serge.tallerr
 * twitter @SergeTallerr
 * skype: Serge.tallerr
 */
$connect =
     array(
        'host' => 'localhost',
        'name' => 'xiag',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8'
    );

$db = new PDO(
    "mysql:host=".$connect['host'].";
    dbname=".$connect['name'].";
    charset=".$connect['charset']."",
    $connect['user'],
    $connect['password']
);