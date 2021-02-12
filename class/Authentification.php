<?php

/**
 * @Author: Yacine Boufala
 * @Date:   2021-02-10 16:54:14
 * @Last Modified by:   root
 * @Last Modified time: 2021-02-10 16:58:50
 */
class Authentification {
	
	private $options = [
		'restriction_msg' => "You can't access this page !",
	];
	private $session;

	public function __construct($session, $options = []){
		$this->options = array_merge($this->options, $options);
		$this->session = $session;
	}


}