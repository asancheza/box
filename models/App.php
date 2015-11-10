<?php
  include_once ("database.php");
  include_once ("CrudInterface.php");
  
	class App extends Database implements Crud {
  	private $name;
    private $contents;

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
      $this->insertQuery('apps')
        ->set('name', $_POST["name"])
        ->set('description', $_POST["description"])
        ->set('user_id', $_POST["user_id"]);

      $result   = $this->execute();

      return $result;
    }

    public function delete() {
      $this->deleteQuery('apps')
        ->where('id', $_GET["id"]);

      $result   = $this->execute();

      $this->deleteQuery('contents')
        ->where('app_id', $_GET["id"]);

      $result   = $this->execute();

      return $result;
    }

    public function show() {
      $this->selectQuery('apps')
        ->field('*');

      $resultData   = $this->execute();
      
      $result = null; 

      while ($userRow = $resultData->fetch_assoc()) {
        $result[] = $userRow;
      }

      return $result;
    }

    public function update() {
    }
  }
?>