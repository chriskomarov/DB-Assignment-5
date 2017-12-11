<?php require 'header.php' ?>

    <div class="container">
		
		<?php
			//Hide if flower already selected
			?>
		<form class="form-inline" method="get">
		  <div class="form-group">
			<label for="flower">Flower</label>
			<select class="form-control" id="flower" ></select>
		  </div>
		  
		  <button type="submit" class="btn btn-default">Go</button>
		</form>
		<?php
		//Only show if flower selected
		?>
      <form method="post" class="form-horizontal">
		  <div class="form-group">
			<label for="genus" class="col-sm-2 control-label">Genus</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="genus" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="species" class="col-sm-2 control-label">Species</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="species" value="">
			</div>
		  </div>
		  <div class="form-group">
			<label for="comname" class="col-sm-2 control-label">Common Name</label>
			<div class="col-sm-10" >
				<input type="text" class="form-control" id="comanme" value="">
			</div>
		  </div>
		  
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

    </div><!-- /.container -->


 <?php require 'footer.php' ?>
