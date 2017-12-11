<?php require 'header.php' ?>

    <div class="container">

        <form class="form-inline">
		  <div class="form-group">
			<label for="flower">Flower</label>
			<select class="form-control" id="flower" ></select>
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
