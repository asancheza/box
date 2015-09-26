<?php

  include ("database.php");
  
	class Users extends Database {
  	private $username;
  	private $password;
  	private $company;

    /*public function __construct() {
      $this->setTable('users');
    }*/

  	/**
     * Set username
     *
     * @return string 
     */
  	public function setUsername($name) {
  		$this->username = $name;
  		return $this;
  	}

  	/**
     * Get username
     *
     * @return string 
     */
  	public function getUsername() {
  		return $this->username;
  	}

  	/**
     * Set password
     *
     * @param string $password
     *
     * @return Users model
     */
  	public function setPassword($password) {
  		$this->password = $password;

  		return $this;
  	}

  	/**
     * Get password
     *
     * @return string 
     */
  	public function getPassword() {
  		return $this->username;
  	}

  	/**
     * Set company
     *
     * @param string $company
     *
     * @return Users model
     */
  	public function setCompany($company) {
  		$this->company = $company;

  		return $this;
  	}

  	/**
     * Get company
     *
     * @return string 
     */
  	public function getCompany() {
  		return $this->company;
  	}

    /*
     * Check login 
     */
    public function checkUsernamePassword() {
      $this->selectQuery('users')
        ->field('*')
        ->where('username', $_POST["username"])
        ->where('password', $_POST["password"]);

        $result   = $this->execute();

      if ($result->num_rows >= 1) {
        session_start();
        $this->setUsername($_POST["username"]);
        return true;
      }

      return false;
    }
  }
?>