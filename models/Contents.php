<?php

  include ("database.php");

	class Contents extends Database {
  	private $name;
    private $text;
    private $images;
    private $type;

    public function setName($name) {
      $this->name = $name;
    }

    public function getName() {
      return $this->name;
    }

    public function setType($type) {
      $this->type = $type;
    }

    public function getType() {
      return $this->type;
    }
  }
?>