<?php
include ('functions.php');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div id="wrap">
			<div class="container">
				<div class="row">
					<form class="form-horizontal" action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
						<fieldset>
							<!-- Form Name -->
							<legend>Amazon Product CSV Converter</legend>
							<!-- File Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="filebutton">Select csv File:</label>
								<div class="col-md-4">
									<input type="file" name="file" id="file" class="input-large">
								</div>
							</div>
							<!-- option field -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="singlebutton">Choose output format</label>
								<div class="col-md-4">
									<input type="radio" name="convert_type" value="ebay" class="radio-class" checked="" />Type 1
									<input type="radio" name="convert_type" value="alibaba" class="radio-class" />Type 2
								</div>
							</div>							
							<!-- Button -->
							<div class="form-group">
								<label class="col-md-4 control-label" for="singlebutton">Convert file</label>
								<div class="col-md-4">
									<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Convert file</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>