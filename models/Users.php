<?php
  include_once ("database.php");
  include_once ("CrudInterface.php");
  
	class Users extends Database implements Crud {
    private $id;
  	private $username;
  	private $password;
    private $phone;
  	private $company;
    private $email;
    private $role;
    private $position;

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
     * Set position
     *
     * @param string $position
     *
     * @return Users model
     */
    public function setPosition($position) {
      $this->position = $position;

      return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getPosition() {
      return $this->position;
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
    public function setRole($role) {
      $this->role = $role;

      return $this;
    }

    /**
     * Get phone of user
     *
     * @return string 
     */
    public function getPhone() {
      return $this->phone;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return Users model
     */
    public function setPhone($phone) {
      $this->phone = $phone;

      return $this;
    }

    /*
     * Check login 
     */
    public function checkUsernamePassword() {
      $this->selectQuery('users')
        ->field('*')
        ->where('username', $_POST["username"])
        ->where('password', md5($_POST["password"]));

      $result   = $this->execute();

      if ($result->num_rows >= 1) {
        @session_start();
        $userRow = $result->fetch_assoc();
        $this->setId($userRow["id"]);
        $this->setUsername($userRow["username"]);
        $this->setRole($userRow["role"]);
        return true;
      }

      return false;
    }

    /*
     * Check login 
     */
    public function create() {
      $this->insertQuery('users')
        ->set('username', $_POST["username"])
        ->set('password', md5($_POST["password"]));

      $result   = $this->execute();

      return $result;
    }

    public function update() {
      $this->updateQuery('users')
        ->set('role', $_POST["role"])
        //->set('position', $_POST["position"])
        ->set('company', $_POST["company"])
        //->set('phone', $_POST["phone"])
        //->set('email', $_POST["phone"])
        ->where('id', unserialize($_SESSION["user"])->getId());

      $result   = $this->execute();

      return $result;
    }

    public function delete() {
      $this->deleteQuery('users')
        ->where('id', unserialize($_SESSION["user"])->getId());

      $result   = $this->execute();

      return $result;
    }

    public function show() {

    }
  }
?>