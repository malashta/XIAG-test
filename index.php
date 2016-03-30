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

require_once('settings/db.php');
require_once('settings/system.php');
require_once('system/App.php');

$app = new App();
$get      = trim($_SERVER['REQUEST_METHOD'] === 'GET');
$pageName  = explode('/', $get);

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    print_r($app->gen_name());
//    if($_SERVER['QUERY_STRING']) {
//        $url = explode('=', $_SERVER['QUERY_STRING'])[1];
//        $check = $db->prepare("SELECT * FROM `link` WHERE alias = :link");
//        $check->bindValue(':link', $url);
//        $check->execute();
//        $result = $check->fetch(PDO::FETCH_ASSOC);
//        if($result) {
//            $db->query("UPDATE `link` SET clicks = clicks + 1 WHERE id = ".$result['id']);
//            header("Location: http://{$result['link']}");
//        }
//    }
    require_once('html/index.html');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}



