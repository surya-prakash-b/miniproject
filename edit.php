<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["AID"])) {
		echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}

	// Fetch existing class details based on CID
	if(isset($_GET['id'])) {
		$cid = $_GET['id'];
		$sql = "SELECT * FROM class WHERE CID = $cid";
		$result = $db->query($sql);
		
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$cname = $row['CNAME'];
			$csec = $row['CSEC'];
		} else {
			echo "<script>window.open('index.php?mes=Class not found...','_self');</script>";
		}
	}

	// Handle form submission for updating class details
	if(isset($_POST["edit_submit"])) {
		$edit_cid = $_POST["edit_cid"];
		$edit_cname = $_POST["edit_cname"];
		$edit_sec = $_POST["edit_sec"];
		
		$sql_update = "UPDATE class SET CNAME = '$edit_cname', CSEC = '$edit_sec' WHERE CID = $edit_cid";
		if($db->query($sql_update)) {
			echo "<script>window.open('add_class.php?mes=Update Success...', '_self');</script>";
		} else {
			echo "<div class='error'>Update failed..</div>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Class Details</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include "navbar.php"; ?><br>
	<div id="section">
		<?php include "sidebar.php"; ?><br>
		<h3 class="text">Edit Class Details</h3><br><hr><br>
		<div class="content1">
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
				<input type="hidden" name="edit_cid" value="<?php echo $cid; ?>">
				<label>Class Name</label><br>
				<select name="edit_cname" required class="input2">
					<option value="">Select</option>
					<option value="I" <?php if($cname == 'I') echo 'selected'; ?>>I</option>
					<option value="II" <?php if($cname == 'II') echo 'selected'; ?>>II</option>
					<option value="III" <?php if($cname == 'III') echo 'selected'; ?>>III</option>
					<option value="IV" <?php if($cname == 'IV') echo 'selected'; ?>>IV</option>
					<option value="V" <?php if($cname == 'V') echo 'selected'; ?>>V</option>
					<option value="VI" <?php if($cname == 'VI') echo 'selected'; ?>>VI</option>
					<option value="VII" <?php if($cname == 'VII') echo 'selected'; ?>>VII</option>
					<option value="VIII" <?php if($cname == 'VIII') echo 'selected'; ?>>VIII</option>
					<option value="IX" <?php if($cname == 'IX') echo 'selected'; ?>>IX</option>
					<option value="X" <?php if($cname == 'X') echo 'selected'; ?>>X</option>
				</select><br><br>
				<label>Section</label><br>
				<select name="edit_sec" required class="input2">
					<option value="">Select</option>
					<option value="-" <?php if($csec == '-') echo 'selected'; ?>>-</option>
					<option value="A" <?php if($csec == 'A') echo 'selected'; ?>>A</option>
					<option value="B" <?php if($csec == 'B') echo 'selected'; ?>>B</option>
					<option value="C" <?php if($csec == 'C') echo 'selected'; ?>>C</option>
					<option value="D" <?php if($csec == 'D') echo 'selected'; ?>>D</option>
					<option value="E" <?php if($csec == 'E') echo 'selected'; ?>>E</option>
					<option value="F" <?php if($csec == 'F') echo 'selected'; ?>>F</option>
				</select><br><br>
				<button type="submit" class="btn" name="edit_submit">Update Class Details</button>
			</form>
		</div>
	</div>
	<?php include "footer.php"; ?>
</body>
</html>
