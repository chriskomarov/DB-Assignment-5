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
		$this->getConnection();
		$sql = "SELECT * FROM SIGHTINGS WHERE NAME = :flower";
		$stmt = $this->conn->prepare($sql);
		if($stmt === False){
			return null;
		}
		$stmt->execute(array(':flower' => $flower));
		$results = $stmt -> fetchAll();
		$results_array = array();
		foreach($results as $row){
			$cur_row = array();
			$cur_row['name'] = $row['NAME'];
			$cur_row['person'] = $row['PERSON'];
			$cur_row['location'] = $row['LOCATION'];
			$cur_row['sighted'] = $row['SIGHTED'];
			$results_array[] = $cur_row;
		}
		return $results_array;
	}
	public function updateFlowers($flower, $genus, $species, $comname){

	}
	public function addSighting($flower, $person, $location, $sighted){

	}
	public function close(){
		$this->conn = null;
	}
}
