<?php

class GFileDB {
	
	private $dbPath;
	public $data = array();
	
	public function __construct ($dbPath) {
		$this->dbPath = $dbPath;
		$this->updateCache();
	}
	
	private function updateCache() {
		$this->data = json_decode(file_get_contents($this->dbPath), true);
	}
	
	public function commit() {
		return file_put_contents($this->dbPath, json_encode($this->data));
	}
}