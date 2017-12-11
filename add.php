<?php require 'header.php' ?>

    <div class="container">
	<h2>Add Sighting</h2>
      <form class="form-horizontal" method="post">
		  <div class="form-group">
			<label for="flower" class="col-sm-2 control-label">Flower</label>
			<div class="col-sm-10">
				<select class="form-control" id="flower" ></select>
			</div>
		  </div>
		  
		  <div class="form-group">
			<label for="person" class="col-sm-2 control-label">Person</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="person" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="location" class="col-sm-2 control-label">Location</label>
			<div class="col-sm-10" >
				<select class="form-control" id="location" ></select>
			</div>
		  </div>
		  <div class="form-group">
			<label for="sighted" class="col-sm-2 control-label">Sighted</label>
			<div class="col-sm-10" >
				<input type="text" class="form-control" id="sighted" value="">
				<p class="help-block">YYYY-MM-DD format.</p>
			</div>
		  </div>
		  
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

    </div><!-- /.container -->

    </div><!-- /.container -->


 <?php require 'footer.php' ?>
