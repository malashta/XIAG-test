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
$getPage  = explode('/', $get);




