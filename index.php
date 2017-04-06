<?php
/**
 * Created by PhpStorm.
 * User: davidmaarek
 * Date: 06/04/2017
 * Time: 17:06
 */

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;

require_once 'vendor/autoload.php';

session_start();

$appId = '1346023342101053';
$appSecret = 'e34bb998657e63449a478b26a380eaa0';

FacebookSession::setDefaultApplication($appId, $appSecret);

$helper =  new FacebookRedirectLoginHelper('http://localhost:8888/ECV/api_exam/index.php');

if(isset($_SESSION) && isset($_SESSION['fb_token']))
{
    $session = new FacebookSession($_SESSION['fb_token']);
}
else
{
    $session = $helper->getSessionFromRedirect();
}

if($session)
{
    $_SESSION['fb_token'] = $session->getToken();
    $request = new \Facebook\FacebookRequest($session, 'GET', '/me');
    $profile = $request->execute()->getGraphObject('Facebook\GraphUser');
    var_dump($profile->getName());
    $_SESSION['prenom'] = explode(' ', $profile->getName())[0];
    var_dump($_SESSION);
    header('location: wikipedia.php');

}
else
{
    echo '<a href="'.$helper->getLoginUrl(['email']).'">Se connecter avec Facebook</a>';
}
