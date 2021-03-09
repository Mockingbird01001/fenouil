<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-03-07 02:05:53
 * @Last Modified by:   Mockingbird01001
 * @Last Modified time: 2021-03-09 20:36:52
 */

	require_once './class/App.php';
	require_once './class/Auth.php';
	require_once './class/Database.php';
	require_once './class/Session.php';
	require_once './class/Validator.php';

	$err = array();
	$validator = new Validator($_POST);
    $auth = App::getAuth();
    $db = App::getDatabase();

    if($_POST and !empty($_POST['email_newsletter'])):
		$validator->isEmail('email_newsletter', 'Invalid email detected !');
		if($validator->isValid()):
			if($validator->isHere($db, 'newsletter', 'email', htmlspecialchars($_POST['email_newsletter']))):
				$auth->addToNewsletter($db, htmlspecialchars($_POST['email_newsletter']));
			endif;
			$session = Session::getInstance();
			$session->setFlash('success', 'Email added successfully');
		endif;
	endif;

?>
<!-- News Letter -->
		<section class="news-letter padding-top-150 padding-bottom-150">
			<div class="container">
				<div class="heading light-head text-center margin-bottom-30">
					<h4>NEWSLETTER</h4>
					<span>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsumien lacus, eu posuere odi </span> </div>

					<?php if(!empty($errors)): ?>
						<div class="alert alert-danger">
							<p>Formulaire rempli incorrectement</p>
							<ul>
							<?php foreach($errors as $error): ?>
								<li><?= $error; ?></li>
							<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

				<form method="POST">
					<input type="email" name="email_newsletter" placeholder="Enter your email address">
					<button type="submit" name="newsletter_Send">SEND ME</button>
				</form>
			</div>
		</section>


		<!-- newsletter -->