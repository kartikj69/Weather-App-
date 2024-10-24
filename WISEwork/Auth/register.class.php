<?php 
class RegisterUser{
	// Class properties
	private $username;
	private $raw_password;
	private $encrypted_password;
	public $error;
	public $success;
	private $storage = "data.json";
	private $stored_users;
	private $new_user; // array 

	// Constructor to initialize the class properties
	public function __construct($username, $password){

		$this->username = trim($this->username);
		$this->username = filter_var($username, FILTER_SANITIZE_STRING);

		$this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
		$this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

		$this->stored_users = json_decode(file_get_contents($this->storage), true);

		$this->new_user = [
			"username" => $this->username,
			"password" => $this->encrypted_password,
		];

		if($this->checkFieldValues()){
			$this->insertUser();
		}
	}

	// Method to check if the required fields are filled
	private function checkFieldValues(){
		if(empty($this->username) || empty($this->raw_password)){
			$this->error = "Both fields are required.";
			return false;
		}else{
			return true;
		}
	}

	// Method to check if the username already exists
	private function usernameExists(){
		foreach($this->stored_users as $user){
			if($this->username == $user['username']){
				$this->error = "Username already taken, please choose a different one.";
				return true;
			}
		}
		return false;
	}

	// Method to insert the new user into the storage
	private function insertUser(){
		if($this->usernameExists() == FALSE){
			array_push($this->stored_users, $this->new_user);
			if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
				return $this->success = "Your registration was successful";
			}else{
				return $this->error = "Something went wrong, please try again";
			}
		}
	}

	// Method to handle errors
	private function handleError($errorMessage){
		$this->error = $errorMessage;
	}

	// Method to handle success
	private function handleSuccess($successMessage){
		$this->success = $successMessage;
	}

} // end of class