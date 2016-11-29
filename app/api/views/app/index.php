<!DOCTYPE html>
<html>
<head>
	<title>API Yoguku</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap-theme.min.css">
</head>
<body>

	<!-- Static navbar -->
	<nav class="navbar navbar-default">
		<div class="">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="javascript:void(0);">API Yoguku</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="<?php echo base_url(); ?>">Default <span class="sr-only">(current)</span></a></li>
					<li><a href="<?php echo base_url(); ?>">Lorem ipsum</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</nav>

	<div class="container">
		<div class="list-group">
		    <a href="javascript:void(0);" class="list-group-item active">DATA ACCESS</a>
		    <a href="<?php echo base_url(); ?>material/data" class="list-group-item">Data Bahan Baku</a>
		    <a href="<?php echo base_url(); ?>" class="list-group-item">Lorem ipsum dulur angel dijak ngopi</a>
		    <a href="<?php echo base_url(); ?>" class="list-group-item">Lorem ipsum dulur angel dijak ngopi</a>
		    <a href="<?php echo base_url(); ?>" class="list-group-item">Lorem ipsum dulur angel dijak ngopi</a>
		    <a href="<?php echo base_url(); ?>" class="list-group-item">Lorem ipsum dulur angel dijak ngopi</a>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>asset/jquery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>