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
			$results_array[$row['COMNAME']] = $cur_row;
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
	public function updateFlower($flower, $genus, $species, $comname){
		$this->getConnection();
		$sql = "UPDATE FLOWERS SET COMNAME = :comname, GENUS = :genus, SPECIES = :species WHERE COMNAME =:flower";
		$stmt = $this->conn->prepare($sql);
		if($stmt == False) return False;
		return $stmt->execute(array(':comname'=>$comname, ':genus'=>$genus, ':species'=>$species, ':flower' =>$flower));

	}
<<<<<<< HEAD
	public function addSighting($name, $person, $location, $sighted){
		$this->getConnection();
		echo("$name<br>$person<br>$location<br>$sighted<br>");
		$sql = "INSERT INTO SIGHTINGS (NAME, PERSON, LOCATION, SIGHTED) VALUES (NAME = $name, PERSON= $person, LOCATON= $location, SIGHTED= $sighted)";
		$stmt = $this->conn->prepare($sql);
		if($stmt == False) return False;
		return $stmt->execute(array(':NAME'=>$name, ':PERSON'=>$person, ':LOCATION'=>$location, ':SIGHTED'=>$sighted));
=======
	public function addSighting($flower, $person, $location, $sighted){
		$this->getConnection();
		$sql = "INSERT INTO SIGHTINGS (NAME,PERSON,LOCATION,SIGHTED) VALUES (:flower, :person, :location, :sighted)";
		$stmt = $this->conn->prepare($sql);
		if($stmt == False) return False;
		return $stmt->execute(array(':NAME'=>$flower, ':PERSON'=>$person, ':LOCATION'=>$location, ':SIGHTED'=>$sighted));
>>>>>>> dde71fe44b1aee425f2b021f6403c54f1ada1ead
	}

	public function close(){
		$this->conn = null;
	}
}
