<?php
	require 'inc/auto_Include.php';
	$db = App::getDatabase();
	
	if(App::getAuth()->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance())){
	    Session::getInstance()->setFlash('success', "Votre compte à bien été validé");
	    App::redirect('shop.php');
	}else{
	    Session::getInstance()->setFlash('danger', "Ce token n'est plus valide");
	    App::redirect('login.php');
	}