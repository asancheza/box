<?php

  include_once ("database.php");
  
	class Content extends Database {
  	private $name;
    private $description;

    public function setName($name) {
      $this->name = $name;
    }

    public function getName() {
      return $this->name;
    }

    public function setContents($contents) {
      $this->contents = $contents;
    }

    public function getContents() {
      return $this->contents;
    }

    public function create() {
      $this->insertQuery('contents')
        ->set('name', $_POST["name"])
        ->set('description', $_POST["description"])
        ->set('app_id', (string)$_GET["id"]);

      $result   = $this->execute();

      return $result;
    }

    public function listContents() {
      $this->selectQuery('contents')
        ->field('*')
        ->where('app_id', (string)$_GET["id"]);

      $resultData   = $this->execute();
      
      if ($resultData !== false) {
        while ($userRow = $resultData->fetch_assoc()) {
          $result[] = $userRow;
        }
      } else {
        return false;
      }

      return $result;
    }
  }
?>