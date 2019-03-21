<?php


trait peopleattributes {
        private $firstName;
	private $lastName;
	private $username;
	private $password;
	
        public function __construct($firstName, $lastName, $username, $password) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;		
		$this->username = $username;
                $this->password = $password;
	}
        
        public function __toString(){
            return 'First Name: ' . $this->firstName . ' Last Name: ' . $this->lastName . ' Username: ' . $this->username ."\n";
        }
}
