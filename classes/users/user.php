<?php

abstract class User {
        protected $firstName;
	protected $lastName;
	protected $username;
	protected $password;
	
        public function __construct($firstName, $lastName, $username, $password) {
		$this->firstName = $firstName;
		$this->lastName = $lastName;		
		$this->username = $username;
                $this->password = $password;
	}
        

        
        }

    // convert to string to show data for create users function in library class, left off password for data protection     
        //function log in
        //function to log out
        //function change password
        //function change email
