<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 16:54:14
 * @Last Modified by:   Mockingbird01001
 * @Last Modified time: 2021-03-07 04:52:57
 */

class Auth {
	
	private $options = ['restriction_msg' => "You can't access this page !"];
	private $session;

	public function __construct($session, $options = []){
		$this->options = array_merge($this->options, $options);
		$this->session = $session;
	}

	public function register($db, $firstName, $lastName, $email, $phone, $password, $adresse, $town){
		$password = $this->hashPassword($password);
		$ConfirmationToken = Str::random(250);
		$db->query("INSERT INTO users SET firstName=?, lastName=?, email=?, phone=?, password=?, adresse=?, town=?, cryptoCode=?, cryptoEmail=?, remember_token=?, confirmation_token=?", 
			[$firstName, $lastName, $email, $password, $adresse, $town, Str::random(100), Str::random(50), null, $ConfirmationToken]
		);
		// $user_id = $db->lastInsertId();
	}

	public function confirm($db, $user_id, $token){
		$user = $db->query('SELECT * FROM users WHERE id = ?', [$user_id])->fetch();
		if($user && $user->confirmation_token == $token ){
			$db->query('UPDATE users SET confirmation_token = NULL, confirmation_at = NOW() WHERE id = ?', [$user_id]);
			$this->session->write('auth', $user);
			return true;
		}
		return false;
	}

	public function restrict(){
		if(!$this->session->read('auth')){
			$this->session->setFlash('danger', $this->options['restriction_msg']);
			header('Location: Connexion.php');
			exit();
		}
	}

	public function user(){
		if(!$this->session->read('auth')){
			return false;
		}
		return $this->session->read('auth');
	}

	public function connect($user){
		$this->session->write('auth', $user);
	}

	public function connectFromCookie($db){
		if(isset($_COOKIE['remember']) && !$this->user()){
			$remember_token = $_COOKIE['
			'];
			$parts = explode('==', $remember_token);
			$user_id = $parts[0];
			$user = $db->query('SELECT * FROM users WHERE id = ?', [$user_id])->fetch();
			if($user){
				$expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'Mockingbird01001');
				if($expected == $remember_token){
					$this->connect($user);
					setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
				} else{
					setcookie('remember', null, -1);
				}
			}else{
				setcookie('remember', null, -1);
			}
		}
	}

	public function login($db, $email, $password, $remember = false){
		$user = $db->query('SELECT * FROM users WHERE (email = :email) AND confirmation_at IS NOT NULL', ['email' => $email])->fetch();
		if($user){
			if(password_verify($password, $user->password)){
				$this->connect($user);
				if($remember) $this->remember($db, $user->id) ; 
				return $user;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function remember($db, $user_id){
		$remember_token = Str::random(250);
		$db->query('UPDATE users SET remember_token = ? WHERE id = ?', [$remember_token, $user_id]);
		setcookie('remember', $user_id . '==' . $remember_token . sha1($user_id . 'Mockingbird050'), 0);

	}

	public function logout(){
		setcookie('remember', NULL, -1);
		$this->session->delete('auth');
	}

	public function changePassword($db, $email, $password){
		$res = $db->query("UPDATE users SET password=? WHERE email=?", [$this->hashPassword($password), $email]);
		if($res){
			return true;
		}
		return false;
	}

	public function resetPassword($db, $email){
		$reset_token = Str::random(60);
		$user = $db->query('SELECT * FROM users WHERE email = ? AND confirmation_at IS NOT NULL', [$email])->fetch();
		if($user){
			$db->query('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?', [$reset_token, $user->id]);
			return $user;
		}
		return false;
	}

	public function checkResetToken($db, $user_id, $token){
		return $db->query('SELECT * FROM users WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)', [$user_id, $token])->fetch();
	}

}