<?php

  include ("database.php");
  
	class Users extends Database {
    private $id;
  	private $username;
  	private $password;
  	private $company;
    private $email;
    private $role;

    /*public function __construct() {
      $this->setTable('users');
    }*/

    /**
     * Set id
     *
     * @return string 
     */
    public function setId($id) {
      $this->id = $id;
      return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId() {
      return $this->id;
    }

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
  		return $this->password;
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
  	public function getEmail() {
  		return $this->email;
  	}

    /**
     * Set email
     *
     * @param string $company
     *
     * @return Users model
     */
    public function setEmail($email) {
      $this->email = $email;

      return $this;
    }

    /**
     * Get type of user
     *
     * @return string 
     */
    public function getRole() {
      return $this->role;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Users model
     */
    public function setRole($type) {
      $this->type = $role;

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
        @session_start();
        $userRow = $result->fetch_assoc();

        $this->setId($userRow["id"]);
        $this->setUsername($userRow["username"]);
        return true;
      }

      return false;
    }

    /*
     * Check login 
     */
    public function insertUser() {
      $this->insertQuery('users')
        ->set('username', $_POST["username"])
        ->set('password', $_POST["password"]);

      $result   = $this->execute();

      return $result;
    }
  }
?>