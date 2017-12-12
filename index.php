<?php require 'header.php';
  require 'database.php';

  $db = new Database();
  $flowers = $db->getFlowers();
  $message = null;
//something is going wrong in here

  if(isset($_GET) && isset($_GET['flower'])){
    if($_GET['flower'] == -1){
      $message = "Please select a flower";
    }
    else {
      $flower = $_GET['flower'];
      $sightings = $db->getSightings($flower);
    }
  }
//until here. It seems to be that it never really goes to the else statement properly or by default?
?>

    <div class="container">
      <?php
        if(!is_null ($message)){
          echo('<div class = "panel panel-default"><div class = "bg-danger panel-body">' .$message.'</div></div><br>');
        }
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
		<hr>
		<h2>Sightings for <?= $flower ?></h2>
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<th>Person</th>
				<th>Location</th>
				<th>Sighted</th>
			</tr>
      <?php
        foreach($sightings as $s):
      ?>
        <tr>
          <td><?=$s['name']?></td>
          <td><?=$s['person']?></td>
          <td><?=$s['location']?></td>
          <td><?=$s['sighted']?></td>
        </tr>
      <?php
        endforeach;
       ?>
		</table>
    </div><!-- /.container -->


 <?php require 'footer.php' ?>
