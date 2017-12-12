<?php
class Database{
	public $conn = null;

	public function getConnection(){
		if(!isset($conn)|| is_null($conn)){
				$this->conn = new PDO('sqlite:./flowers.db');
		}
	}
	public function getFlowers (){
		$this->getConnection();
		$sql = "SELECT * FROM FLOWERS ORDER BY COMNAME";
		$results = $this->conn->query($sql);
		$results_array = array();
		foreach($results as $row){
			$cur_row = array();
			$cur_row['comname'] = $row['COMNAME'];
			$cur_row['genus'] = $row['GENUS'];
			$cur_row['species'] = $row['SPECIES'];
			$results_array[] = $cur_row;
		}
		return $results_array;
	}
	public function getSightings($flower){

	}
	public function updateFlowers($flower, $genus, $species, $comname){

	}
	public function addSighting($flower, $person, $location, $sighted){

	}
	public function close(){

	}
}
