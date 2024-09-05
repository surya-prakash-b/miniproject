<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["AID"])) {
		echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}

	// Fetch existing subject details based on SID
	if(isset($_GET['id'])) {
		$sid = $_GET['id'];
		$sql = "SELECT * FROM sub WHERE SID = $sid";
		$result = $db->query($sql);
		
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$sname = $row['SNAME'];
		} else {
			echo "<script>window.open('index.php?mes=Subject not found...','_self');</script>";
		}
	}

	// Handle form submission for updating subject details
	if(isset($_POST["edit_submit"])) {
		$edit_sid = $_POST["edit_sid"];
		$edit_sname = $_POST["edit_sname"];
		
		$sql_update = "UPDATE sub SET SNAME = '$edit_sname' WHERE SID = $edit_sid";
		if($db->query($sql_update)) {
			echo "<script>window.open('add_sub.php?mes=Update Success...', '_self');</script>";
		} else {
			echo "<div class='error'>Update failed..</div>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Subject Details</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include "navbar.php"; ?><br>
	<div id="section">
		<?php include "sidebar.php"; ?><br><br><br>
		<h3 class="text">Edit Subject Details</h3><br><hr><br>
		<div class="content1">
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
				<input type="hidden" name="edit_sid" value="<?php echo $sid; ?>">
				<label>Subject Name</label><br>
				<input type="text" name="edit_sname" value="<?php echo $sname; ?>" required class="input">
				<button type="submit" class="btn" name="edit_submit">Update Subject Details</button>
			</form>
		</div>
	</div>
	<?php include "footer.php"; ?>
</body>
</html>
