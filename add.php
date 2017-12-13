<?php require 'header.php';
  require 'database.php';

  $db = new Database();
  $flowers = $db->getFlowers();
  $message = null;


  if(isset($_POST) && isset($_POST['flower'])){
    $flower= $_POST['flower'];
    $person = $_POST['person'];
    $location = $_POST['location'];
    $sighted = $_POST['sighted'];
    $response = $db->addSighting($flower, $person, $location, $sighted);
    if($response){
      $message = $flower . "Sighting has been added!";
    }else{
      $message = $flower . "Sighting not added.";
    }
  }
?>

    <div class="container">
	<center><h2>Add Sighting</h2></center>
      <form class="form-horizontal" method="post">
		  <div class="form-group">
			<label for="flower" class="col-sm-2 control-label">Flower</label>
			<div class="col-sm-10">
				<select class="form-control" id="flower" >
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
        <input name = 'flower' value = "<?=$flower['comname']?>" type='hidden'>
		  <div class="form-group">
			<label for="person" class="col-sm-2 control-label">Person</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="person" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="location" class="col-sm-2 control-label">Location</label>
			<div class="col-sm-10" >
				<input type="text" class="form-control" id="location" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="sighted" class="col-sm-2 control-label">Sighted</label>
			<div class="col-sm-10" >
				<input type="text" class="form-control" id="sighted" value="">
				<p class="help-block">YYYY-MM-DD format.</p>
			</div>
		  </div>

		  <center><button type="submit" class="btn btn-default">Submit</button></center>
		</form>

    </div><!-- /.container -->

    </div><!-- /.container -->


 <?php require 'footer.php' ?>
