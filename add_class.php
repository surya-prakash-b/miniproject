<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["AID"])) {
		echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Students Hub</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include "navbar.php"; ?><br>
	<img src="img/1.png" style="margin-left:250px;" class="sha">
	<div id="section">
		<?php include "sidebar.php"; ?><br>
		<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
		<div class="content1">
			<h3>Add Dept Details</h3><br>
			<?php
				if(isset($_POST["submit"])) {
					$cname = $_POST["cname"];
					$sec = $_POST["sec"];
					
					$sq = "INSERT INTO class (CNAME, CSEC) VALUES ('$cname', '$sec')";
					if($db->query($sq)) {
						echo "<div class='success'>Insert Success..</div>";
					} else {
						echo "<div class='error'>Insert failed..</div>";
					}
				}
				
				// Edit form submission handling
				if(isset($_POST["edit_submit"])) {
					$edit_cid = $_POST["edit_cid"];
					$edit_cname = $_POST["edit_cname"];
					$edit_sec = $_POST["edit_sec"];
					
					$sq = "UPDATE class SET CNAME = '$edit_cname', CSEC = '$edit_sec' WHERE CID = $edit_cid";
					if($db->query($sq)) {
						echo "<div class='success'>Update Success..</div>";
					} else {
						echo "<div class='error'>Update failed..</div>";
					}
				}
			?>
			
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
				<label>Class Name</label><br>
				<select name="cname" required class="input2">
					<option value="">Select</option>

					<option value="CSE">CSE</option>
					<option value="IT">IT</option>
					<option value="ECE">ECE</option>
					<option value="EEE">EEE</option>
					<option value="MECH">MECH</option>
					<option value="CSBS">CSBS</option>
					<option value="AIDS">AIDS</option>
					<option value="AIML">AIML</option>
					<option value="CIVIL">CIVIL</option>
					<option value="MBA">MBA</option>

					
				</select><br><br>
				<label>Section</label><br>
				<select name="sec" required class="input2">
					<option value="">Select</option>
					<option value="-">-</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
					<option value="F">F</option>
				</select><br><br>
				<button type="submit" class="btn" name="submit">Add Dept Details</button>
			</form>
		</div>
		
		<div class="tbox">
			<h3 style="margin-top:30px;">Dept Details</h3><br>
			<?php
				if(isset($_GET["mes"])) {
					echo "<div class='error'>{$_GET["mes"]}</div>";	
				}
			?>
			
			<table border="1px">
				<tr>
					<th>S.No</th>
					<th>Dept Name</th>
					<th>Section</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					$s = "SELECT * FROM class";
					$res = $db->query($s);
					if($res->num_rows > 0) {
						$i = 0;
						while($r = $res->fetch_assoc()) {
							$i++;
							echo "
								<tr>
									<td>{$i}</td>
									<td>{$r["CNAME"]}</td>
									<td>{$r["CSEC"]}</td>
									<td><a href='edit.php?id={$r["CID"]}' class='btn'>Edit</a></td>
									<td><a href='delete.php?id={$r["CID"]}' class='btnr'>Delete</a></td>
								</tr>
							";
						}
					}
				?>
			</table>
		</div>
	</div>

	<?php include "footer.php"; ?>
</body>
</html>
