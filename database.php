<?php

class Database {
  public $connection;
  public $config;
  public $debug;
  public $query;
  public $field;
  public $column;
  public $table;
  public $type;
  public $limit;

  /*
   * Initializes configuration and initial variables for database
   */
	public function __construct() {
    $this->getConfiguration();
    $this->getConnection();
    $this->debug = $this->config->debug;
    $this->field = array();
    $this->where = array();
    $this->equal = array();
    $this->insert = "";
    $this->set = array();
	}

  /*
   * Get configuration object
   *
   * @return Config object
   */
  public function getConfiguration() {
    include_once("config.php");
    $this->config = new Config();
  }

  /*
   * Set field selects
   *
   * @return object
   */
  public function field($field) {
    $this->field[$field] = $field;

    return $this;
  }

  /*
   * Set update fields
   *
   * @return object
   */
  public function set($field, $value) {
    $this->set[$field] = $value;

    return $this;
  }

  /*
   * Where fields
   *
   * @return object
   */
  public function where($where, $equal) {
    $this->where[$where] = $equal;

    return $this;
  }

  /*
   * TODO: Equal
   */
  /*public function equal($equal) {
    $this->equal[] = $equal;

    return $this;
  }*/

  /*
   * Get where
   *
   * @return string
   */
  public function getWhere() {
    return $this->where;
  }

  /*
   * Set Query
   *
   * @return string
   */
  public function setQuery($query) {
    $this->query = $query;

    return $this;
  }

  /*
   * Get Query
   *
   * @return string
   */
  public function getQuery() {
    return $this->query;
  }

  /*
   * Set Table
   *
   * @return string
   */
  public function setTable($table) {
    $this->table = $table;

    return $this;
  }

  /*
   * Get Table
   *
   * @return string
   */
  public function getTable() {
    return $this->table;
  }

  /*
   * Get limit
   *
   * @return string
   */
  public function limit($limit) {
    $this->limit = $limit;

    return $this;
  }

  /*
   * Get limit
   *
   * @return string
   */
  public function getLimit() {
    return $this->limit;
  }

  /*
   * Get Type
   *
   * @return string
   */
  public function setType($type) {
    $this->type = $type;

    return $this;
  }

  /*
   * Get Type
   *
   * @return string
   */
  public function getType() {
    return $this->type;
  }

  /*
   * Get connection instance. Singleton pattern.
   *
   * @return object connection
   */
  public function getConnection() {
    if (null === $this->connection) {
      $this->connection = mysqli_connect($this->config->databaseHost,
                      $this->config->databaseUsername, 
                      $this->config->databasePassword,
                      $this->config->databaseName);
    }

    return $this->connection;
  }

  /*
   * Build update query from fields
   */
  private function getFieldsFromArray($fields) {
    $set = $and = "";
    $count = 0;

    if (is_array($fields)) {
      foreach ($fields as $field) {
        if ($count == 0) 
          $and = "";
        else
          $and = ", ";

        $set .= $and.$field;  
        $count++;
      }
    } else {
      $set = $fields;
    }

    return $set;
  }

  /*
   * Build update query from fields
   */
  private function insertFieldsFromArray($fields) {
    $insert = $and = "";
    $count = 0;

    if (is_array($fields)) {
      foreach ($fields as $key => $field) {
        if ($count == 0) 
          $and = " (";
        else
          $and = ", ";

        $insert .= $and.$key;  
        $count++;
      }

      $insert .= ")";

      $count = 0;
      foreach ($fields as $field) {
        if ($count == 0) 
          $and = " values (";
        else
          $and = ", ";

        $insert .= $and."'".$this->getConnection()->real_escape_string($field)."'";  
        $count++;
      }

      $insert .= ")";
    } else {
      $insert = " SET ".$fields . "=" ."'".$this->getConnection()->real_escape_string($fields)."'";
    }

    return $insert;
  }

  /*
   * Build update query from fields
   */
  private function setFieldsFromArray($fields) {
    $set = $and = "";
    $count = 0;

    if (is_array($fields)) {
      foreach ($fields as $key => $field) {
        if ($count == 0) 
          $and = " SET ";
        else
          $and = ", ";

        $set .= $and.$key . "=" ."'".$this->getConnection()->real_escape_string($field)."'";  
        $count++;
      }
    } else {
      $set = " SET ".$fields . "=" ."'".$this->getConnection()->real_escape_string($fields)."'";
    }

    return $set;
  }

  /*
   * Build where query from columns
   */
	private function whereFromArray($columns) {
		$where = $and = "";
		$count = 0;

		if (is_array($columns)) {
			foreach ($columns as $key => $column) {
				if ($count >= 1) 
					$and = " AND ";

				$where .= $and.$key . "=" ."'".$this->getConnection()->real_escape_string($column)."'";  

        $count++;
			}
		} else {
			$where = $columns . "=" ."'".$this->connection->quote($columns)."'";
		}

		return $where;
	}

  /*
   * Select query from columns
   */
	public function selectQuery($table) {
    $this->setType("select");
    $this->setTable($table);

    return $this;
	}

  /*
   * Update query from columns
   */
  public function insertQuery($table) {
    $this->setType("insert");
    $this->setTable($table);

    return $this;
  }

  /*
   * Update query from columns
   */
  public function updateQuery($table) {
    $this->setType("update");
    $this->setTable($table);

    return $this;
  }

  /*
   * Delete query from columns
   */
	public function deleteQuery($table) {
    $this->setType("delete");
    $this->setTable($table);

    return $this;
	}

  public function flush() {
    $this->setType("");
    $this->setTable("");

    unset($this->field);
    $this->field = array();

    unset($this->where);
    $this->where = array();

    unset($this->set);
    $this->set = array();
  }

  public function execute() {  
    try {
      switch ($this->getType()) {
        case "select":
          $this->query = strtoupper($this->getType());
          $this->query .= " ".$this->getFieldsFromArray($this->field);
          $this->query .= " FROM ".$this->getTable();
          if ('' != $this->whereFromArray($this->getWhere())) $this->query .= " WHERE ".$this->whereFromArray($this->getWhere());
          if (null !== $this->limit) $this->query .= " LIMIT ".$this->limit; 
          //echo $this->query."\n";
          break;

        case "delete":
          $this->query = strtoupper($this->getType());
          $this->query .= " FROM ".$this->getTable();
          if ('' != $this->whereFromArray($this->getWhere())) $this->query .= " WHERE ".$this->whereFromArray($this->getWhere());
          //echo $this->query."\n";
          break;

        case "insert":
          $this->query = strtoupper($this->getType());
          $this->query .= " INTO ".$this->getTable();
          $this->query .= $this->insertFieldsFromArray($this->set);
          if ('' != $this->whereFromArray($this->getWhere())) $this->query .= " WHERE ".$this->whereFromArray($this->getWhere());
          //echo $this->query."\n";
          break;

        case "update":
          $this->query = strtoupper($this->getType());
          $this->query .= " ".$this->getTable();
          $this->query .= $this->setFieldsFromArray($this->set);
          if ('' != $this->whereFromArray($this->getWhere())) $this->query .= " WHERE ".$this->whereFromArray($this->getWhere());
          //echo $this->query."\n";
          break;
      }

      $result = $this->getConnection()->query($this->getQuery());
      if (!$result) {
        echo "<p>There was an error in query: $this->getQuery()</p>";
        echo $this->getConnection()->error;
      }

      $this->flush();

      return $result;
    } catch (Exception $e) {
      print "Error! " . $e->getMessage() . "<br/>";
      die();
    }
  } 
}

class testDatabase {
  public static function select() {
    $database = new Database();

    $database->selectQuery('users')
    ->field('username')
    ->field('password')
    ->where('id', '5');

    $result   = $database->execute();

    $database->selectQuery('users')
    ->field('username')
    ->field('password')
    ->where('id', '15')
    ->where('username', 'Alex');

    $result   = $database->execute();

    $database->selectQuery('users')
    ->field('username')
    ->where('id', '25');

    $result   = $database->execute();

    $database->selectQuery('users')
    ->field('password')
    ->where('id', '35');

    $result   = $database->execute();

    $database->selectQuery('users')
    ->field('*')
    ->where('id', '55');

    $result   = $database->execute();

    $database->selectQuery('users')
    ->field('*')
    ->where('id', '55')
    ->limit(5);

    $result   = $database->execute();
 
  }

  public static function insert() {
    $database = new Database();

    $database->insertQuery('users')
    ->set('username', 'Pablo')
    ->set('password', 'Sanchez');

    $result   = $database->execute();

    $database->insertQuery('users')
    ->set('username', 'Jorge')
    ->set('password', 'Sanchez')
    ->where('id', '5');

    $result   = $database->execute();
  }

  public static function update() {
    $database = new Database();

    $database->updateQuery('users')
    ->set('username', 'Alex');

    $result   = $database->execute();

    $database->updateQuery('users')
    ->set('username', 'Alex')
    ->set('password', 'Sanchez')
    ->where('id', '5');

    $result   = $database->execute();
  }

  public static function delete() {
    $database = new Database();

    $database->deleteQuery('users')
    ->where('id', '5');

    $result   = $database->execute();
  }

  /*
  * Sample test. 
  *
  * FIX: Move to PHPUnit tests
  */
  public static function runTests() {
    testDatabase::select();
    testDatabase::insert();
    testDatabase::update();
    testDatabase::delete();
  }
}  

//testDatabase::runTests();

?>