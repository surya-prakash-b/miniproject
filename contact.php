<?php
	include "database.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Students Hub</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="back">
		<?php include"navbar.php";?>
		<img src="img/front.jpg" width="800">
		
		<div class="login">
			<h1 class="heading">Contact Us</h1>
			<div class="cont">
			
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					K.RAMAKRISHNAN COLLEGE OF ENGG<BR>
					SAMAYAPURAM ROAD<BR>
					TRICHY<BR>
					TAMILNADU<BR>
					Mail - krce@gmail.com<br>Phone - 99854-32456
				</form>
			</div>
		</div>
		<div class="footer">
			<footer><p>Copyright &copy; KRCE </p></footer>
		</div>
		<script src="js/jquery.js"></script>
		 <script>
		$(document).ready(function(){
			$(".error").fadeTo(1000, 100).slideUp(1000, function(){
					$(".error").slideUp(1000);
			});
			
			$(".success").fadeTo(1000, 100).slideUp(1000, function(){
					$(".success").slideUp(1000);
			});
		});
	</script>
		
	
		
	</body>
</html>