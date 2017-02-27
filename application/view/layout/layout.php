<!DOCTYPE html>
<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="public/css/bootstrap.min.css" charset="utf-8" >
	    <link rel="stylesheet" href="public/css/main.css" charset="utf-8" >
	    <link rel="stylesheet" href="public/css/chosen.css" charset="utf-8" />
	    <!-- Latest compiled and minified JavaScript -->
	    <script defer type="text/javascript" src="public/js/jquery-3.1.1.min.js"></script>
		<script defer type="text/javascript" src="public/js/bootstrap.min.js"></script>
		<script defer type="text/javascript" src="public/js/main.js"></script>
		<script defer type="text/javascript" src="public/js/chosen.jquery.min.js"></script>   

	    <title><?php echo Application::$App->title;?></title>
	</head>
	<body class="">
		<div>
		    <?php echo $content;?>
		</div>

	</body>
</html>