<?php
require 'inc/auto_Include.php';

$auth = App::getAuth();
$db = App::getDatabase();
$auth->connectFromCookie($db);

App::getAuth()->logout();
Session::getInstance()->setFlash('success', 'Vous êtes maintenant déconnecté');
App::redirect('login.php');