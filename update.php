<?php require 'header.php';
  require 'database.php';

  $db = new Database();
  $message = null;

    if(isset($_POST) && isset($_POST['editflower'])){
      $req_flower = $_POST['editflower'];
      $genus = $_POST['genus'];
      $species = $_POST['species'];
      $comname = $_POST['comname'];
      $response = $db->updateFlower($req_flower, $genus, $species, $comname);
      if($response){
        $message = $req_flower . " Flower entry has been updated!";
      }else{
        $message = $req_flower . " not updated.";
      }
    }
    $flowers = $db->getFlowers();
    if(isset($_GET) && isset($_GET['flower'])){
      if($_GET['flower'] == -1){
        $message = "Please select a flower";
      }
      else {
        error_reporting( E_WARNING );
        $req_flower = $_GET['flower'];
        $flower = $flowers[$req_flower];
      }
  }else{
    $flowers = $db->getFlowers();
  }
?>

    <div class="container">
    <?php
    if(!is_null ($message)){
      echo('<div class = "panel panel-default"><div class = "bg-success panel-body">' .$message.'</div></div>');
    }
     ?>

		<?php
			//Hide if flower already selected
      if(!isset($flower)):
			?>
      <form class="form-inline" method = "get">
        <div class="form-group">
          <label for="flower">Flower</label>
          <select class="form-control" id="flower"  name = "flower">
            <option value = "-1">Select One</option>
            <?php
                foreach($flowers as $f){  ?>
                  <option value ="<?= $f["comname"]?>"><?php echo $f["comname"];?></option>
                <?php
                  }
             ?>
          </select>
        </div>
        <button type="submit" class="btn btn-default">Go</button>
      </form>
		<?php
  else:
		//Only show if flower selected
		?>
      <form method="post" class="form-horizontal">
		  <div class="form-group">
			<label for="genus" class="col-sm-2 control-label">Genus</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="genus" name='genus' value="<?=$flower['genus'] ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="species" class="col-sm-2 control-label">Species</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="species" name='species' value="<?=$flower['species'] ?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="comname" class="col-sm-2 control-label">Common Name</label>
			<div class="col-sm-10" >
				<input type="text" class="form-control" id="comname" name='comname' value="<?=$flower['comname'] ?>">
			</div>
		  </div>
      <input name = 'editflower' value = "<?=$flower['comname']?>" type='hidden'>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
  <?php endif; ?>

    </div><!-- /.container -->


 <?php require 'footer.php' ?>
