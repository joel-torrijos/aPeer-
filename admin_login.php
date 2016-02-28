<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <style> body { background-color: #FBFBEA } </style>
  <body>
    <div class="container"> 
      <img class="img-responsive center-block" src="Logo.png" class="img-rounded" style="width: 40%; height=auto;"> 
    </div>
	<div>
		<style>
		.askhelp {
			min-width: 250px;
			min-height: 50px;
			color: #FBFBEA; 
			background-color: #F7943E;
			border-radius: 24px;
			font-size: 18px;
			font-family: 'Kreon';
			margin-bottom: 20px;
		}
	</style>
	</div>
	<div class="container">
		<form class="form-horizontal" role="form">
			<div class="form-group">
					<div class="col-xs-4 col-md-offset-4">
						<style>
							.margin{
							margin-bottom: 10px;
							} </style>
							<input class="form-control margin" id="focusedInput" type="text" value="Admin Username">
					</div>
					<div class="col-xs-4 col-md-offset-4">
						<style>
							.margin1{
							margin-bottom: 10px;
						} </style>
						<input class="form-control margin1" id="focusedInput" type="password" value="Password">
					</div>
					</div>
		</form>
		<a href='view_reports.php'><center><button class="askhelp" type="submit" class="btn btn-warning btn-lg" id="submit" value ="submit">LOGIN</button></center></a>
	</div>
  </body>	
</html>