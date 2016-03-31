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
    if($_SERVER['QUERY_STRING']) {
        $urlstring = explode('=', $_SERVER['QUERY_STRING'])[1];
        $check = $db->prepare("SELECT * FROM `link` WHERE alias = :link");
        $check->bindValue(':link', $urlstring);
        $check->execute();
        $result = $check->fetch(PDO::FETCH_ASSOC);
        if($result) {
            $db->query("UPDATE `link` SET clicks = clicks + 1 WHERE id = ".$result['id']);
            header("Location: http://{$result['link']}");
        }
    }
    require_once('html/index.html');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['url'])) {
        if($_POST['method'] === 'add') {
            $newurl = $app->gen_name();
            $urlstring = $_POST['url'];
            if($urlstring) {
                if(!preg_match('@^(?:http://)@i', $urlstring))
                    $urlstring = 'http://'.$urlstring;
                $urlstring = explode('//', $urlstring);
                $urlstring = $urlstring[1];
            } else {
                $return = array(
                    "status" => "error",
                    "message" => "Empty URL",
                    "shorturl" => ""
                );
                echo json_encode($return);
                exit();
            }
            $check = $db->prepare("SELECT * FROM `link` WHERE link = :link OR alias = :link");
            $check->bindValue(':link', $urlstring);
            $check->execute();
            $result = $check->fetch(PDO::FETCH_ASSOC);
            if($result) {
                $return = array(
                    "status" => "ok",
                    "message" => "http://".$result['link']." already exists in database",
                    "shorturl" => "http://".$config['main']['domain']."/".$result['alias']
                );
                echo json_encode($return);
            } else {
                $q = $db->prepare("INSERT INTO `link` (link, alias) VALUES (:link, :alias)");
                $q->execute(array(
                    ':link' => $urlstring,
                    ':alias' => $newurl
                ));
                $return = array(
                    "status" => "ok",
                    "message" => "http://".$urlstring." added to database",
                    "shorturl" => "http://".$config['main']['domain']."/".$newurl
                );
                echo json_encode($return);
            }
        }
    }
}



