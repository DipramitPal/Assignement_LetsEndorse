<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/main.css">
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/jquery.js"> </script>
<script src="assets/js/bootstrap.min.js"> </script>

<script src="assets/js/script.js"> </script>
</head>
<body>
	<div class="page-header">
  		<h1>Assignment</h1>
	</div>
	<div class="container" style="padding-left: 30px;">
		<div class="row">
			<div class="col-lg-6">
			    <div class="input-group">
			      <input type="text" class="form-control search-keyword" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default search-go" type="button">Go!</button>
			      </span>
			    </div><!-- /input-group -->
	  		</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
		<hr>
		<div class="questions">

		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="answerModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close modal-close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"></h4>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default modal-close">Close</button>
						
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</body>
</html>