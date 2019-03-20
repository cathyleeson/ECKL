<?php

// not got around to doing much with admin just yet
class Admin {
	private $firstName;
	private $lastName;
	private $username;
	private $password;
        
        public function __construct($firstName, $lastName, $username) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;		
		$this->username = $username;
	}
        
}

