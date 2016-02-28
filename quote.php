<!DOCTYPE html>
<html>
<head>
<title>Report</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<style> body { background-color: #FBFBEA } </style>
<body>
  <div class="container"> 
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
	<center><p id="quote" style="font-family:Kreon; font-size:50px; margin-top:200px; margin-bottom:100px; color: #4ABCAB;"> Go ahead. Click another one.</p></center>
	<center><button class="askhelp" type="button" class="btn btn-warning btn-lg" id="submit" value ="submit" onclick="generateQuote()">ANOTHER ONE</button></center>
	<a href='report_self.php'><center><button class="askhelp" type="submit" class="btn btn-warning btn-lg" id="submit" value ="submit">I NEED HELP</button></center></a>
	</div>
	
  <p id="error"> </p>

  <script>
	var quotes = [
	"Good, better, best. Never let it rest. 'Til your good is better and your better is best.",
	"Either you run the day or the day runs you.", 
	"What you do today can improve all your tomorrows.", 
	"Don't watch the clock; do what it does. Keep going.", 
	"The secret of getting ahead is getting started.", 
	"Don't watch the clock; do what it does. Keep going.", 
	"One good girl is worth a thousand bitches", 
	"If you can dream it, you can do it.", 
	"Problems are not stop signs, they are guidelines.", 
	"Nigga nigga nigga nigga kentucky fried chicken."];

  function generateQuote(){
  	var index = Math.floor(Math.random() * (9 - 1 + 1)) + 1;
  	document.getElementById("quote").innerHTML = quotes[index];
  }
</script>

</body>
</html>