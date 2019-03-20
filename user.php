<?php

class User {
	private $firstName;
	private $lastName;
	private $username;
	private $password;
	
        // I wasnt sure if we should construct the password or leave it off as it is supposed to be private
        public function __construct($firstName, $lastName, $username, $password) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;		
		$this->username = $username;
                $this->password = $password;
	}
    // convert to string to show data for create users function in library class, left off password for data protection     
        public function __toString(){
            return 'First Name: ' . $this->firstName . ' Last Name: ' . $this->lastName . ' Username: ' . $this->username ."\n";
        }

}

