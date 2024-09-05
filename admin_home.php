<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["AID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
		
	}		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Students Hub</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
	
		<?php include"navbar.php";?><br>
		
		
		<img src="img/1.png" style="margin-left:250px;" class="sha">
			
			<div id="section">
			
				<?php include"sidebar.php";?><br>
				
				<div class="content">
					<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
						<h3 > College Information</h3><br>
					<img src="img/clg.jpg" class="imgs">
					<p class="para">
					Established in the year 2008 K. Ramakrishnan college of Engineering is a leading Engineering college affiliated to Anna University, Chennai, providing valuable courses. K.RAMAKRISHNAN COLLEGE OF ENGINEERING, TIRUCHIRAPALLI, is located in the famous temple town of Shri Samayapuram Mariyamman temple, on the sprawling campus of 30 acres with a panoramic and pleasant view. 
					</p>
					
					<p class="para">
						
					</p>
				</div>
				
			</div>
	
		<?php include"footer.php";?>
	</body>
</html>