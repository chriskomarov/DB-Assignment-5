<?php require 'header.php';
  require 'database.php';
  $db = new Database();
  $flowers = $db->getFlowers();
?>

    <div class="container">

        <form class="form-inline" method = "get">
    		  <div class="form-group">
      			<label for="flower">Flower</label>
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

		  <button type="submit" class="btn btn-default">Go</button>
		</form>
		<hr>
		<h2>Sightings for %%Make Flower Show here%%</h2>
		<table class="table table-striped">
			<tr>
				<th>Name</th>
				<th>Person</th>
				<th>Location</th>
				<th>Sighted</th>
			</tr>

		</table>
    </div><!-- /.container -->


 <?php require 'footer.php' ?>
