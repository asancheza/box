<?php

class Config {
	public $configurationData;
	public $databaseName;
	public $databaseUsername;
	public $databasePassword;
	public $databaseHost;
	public $debug;
	public $template;

	public function __construct() {
		$configurationData = yaml_parse_file("config.yml");
		$this->databaseName = $configurationData['database']['name'];
		$this->databaseUsername = $configurationData['database']['username'];
		$this->databasePassword = $configurationData['database']['password'];
		$this->databaseHost = $configurationData['database']['hostname'];
		$this->databaseType = $configurationData['database']['type'];
    $this->debug = $configurationData['debug'];
    $this->template = $configurationData['template'];
	}
}

?>
