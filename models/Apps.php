<?php

  include ("database.php");
  
	class Apps extends Database {
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
  }
?>