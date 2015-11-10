<?php
  include_once ("database.php");
  include_once ("CrudInterface.php");
  
	class Content extends Database implements Crud {
  	private $name;
    private $description;
    private $image;

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

    public function setImage($image) {
      $this->image = $image;
    }

    public function getImage() {
      return $this->image;
    }

    public function create() {
      $this->insertQuery('contents')
        ->set('name', $_POST["name"])
        ->set('description', $_POST["description"])
        ->set('image', $_POST["image"])
        ->set('app_id', (string)$_GET["id"]);

      $result   = $this->execute();

      return $result;
    }

    public function update() {
      $this->updateQuery('contents')
        ->set('name', $_POST["name"])
        ->set('description', $_POST["description"])
        ->set('image', $_POST["image"])
        ->where('id', $_POST["id"]);

      $result   = $this->execute();

      return $result;
    }

    public function delete() {
      $this->deleteQuery('contents')
        ->where('id', $_GET["id"]);

      $result   = $this->execute();

      return $result;
    }

    public function show() {
      $this->selectQuery('contents')
        ->field('*')
        ->where('app_id', (string)$_GET["id"]);

      $result = '';

      $resultData   = $this->execute();
      
      if ($resultData !== false) {
        while ($userRow = $resultData->fetch_assoc()) {
          $result[] = $userRow;
        }
      } 

      return $result;
    }
  }
?>