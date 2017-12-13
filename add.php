<?php require 'header.php';
  require 'database.php';

  $db = new Database();
  $message = null;


  if(isset($_POST) && isset($_POST['flower'])){
    $name= $_POST['flower'];
    $person = $_POST['person'];
    $location = $_POST['location'];
    $sighted = $_POST['sighted'];
    $response = $db->addSighting($name, $person, $location, $sighted);
    if($response){
      $message = $name . " sighting has been added!";
    }else{
      echo("Unsucessful add");
      //echo("<br>$name<br>$person<br>$location<br>$sighted");
      $message = $name . "sighting not added.";
    }
  }
  $flowers = $db->getFlowers();
?>

    <div class="container">
	<center><h2>Add Sighting</h2></center>
      <form class="form-horizontal" method="post">
		  <div class="form-group">
			<label for="flower" class="col-sm-2 control-label">Flower</label>
			<div class="col-sm-10">
				<select class="form-control" id="flower" name = "flower">
          <option value = "-1">Select One</option>
            <?php
                foreach($flowers as $f){  ?>
                  <option value ="<?= $f["comname"]?>"><?php echo $f["comname"];?></option>
                <?php
                  }
             ?>
        </select>
			</div>
		  </div>
        <input name = 'name' value = "<?=$flower['comname']?>" type='hidden'>
		  <div class="form-group">
			<label for="person" class="col-sm-2 control-label">Person</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="person" name="person" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="location" class="col-sm-2 control-label">Location</label>
			<div class="col-sm-10" >
				<input type="text" class="form-control" id="location" name="location" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="sighted" class="col-sm-2 control-label">Sighted</label>
			<div class="col-sm-10" >
				<input type="text" class="form-control" id="sighted" name="sighted" value="">
				<p class="help-block">YYYY-MM-DD format.</p>
			</div>
		  </div>

		  <center><button type="submit" class="btn btn-default">Submit</button></center>
		</form>

    </div><!-- /.container -->

    </div><!-- /.container -->


 <?php require 'footer.php' ?>
