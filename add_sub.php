<?php
	include "database.php";
	session_start();
	if(!isset($_SESSION["AID"])) {
		echo "<script>window.open('index.php?mes=Access Denied...','_self');</script>";
	}

	// Handle form submission for adding new subject
	if(isset($_POST["add_submit"])) {
		$sname = $_POST["sname"];
		
		$sql_insert = "INSERT INTO sub (SNAME) VALUES ('$sname')";
		if($db->query($sql_insert)) {
			echo "<div class='success'>Insert Success..</div>";
		} else {
			echo "<div class='error'>Insert Failed..</div>";
		}
	}

	// Handle form submission for editing existing subject
	if(isset($_POST["edit_submit"])) {
		$edit_sid = $_POST["edit_sid"];
		$edit_sname = $_POST["edit_sname"];
		
		$sql_update = "UPDATE sub SET SNAME = '$edit_sname' WHERE SID = $edit_sid";
		if($db->query($sql_update)) {
			echo "<script>window.open('index.php?mes=Update Success...', '_self');</script>";
		} else {
			echo "<div class='error'>Update failed..</div>";
		}
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
		<?php include "sidebar.php"; ?><br><br><br>
		<h3 class="text">Welcome <?php echo $_SESSION["ANAME"]; ?></h3><br><hr><br>
		<div class="content1">
			<h3>Add Subject Details</h3><br>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
				<label>Subject Name</label><br>
				<input type="text" name="sname" required class="input">
				<button type="submit" class="btn" name="add_submit">Add Subject</button>
			</form>
		</div>

		<div class="content1">
			<h3>Edit Course Details</h3><br>
			<table border="1px">
				<tr>
					<th>S.No</th>
					<th>Course Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
					$s = "SELECT * FROM sub";
					$res = $db->query($s);
					if($res->num_rows > 0) {
						$i = 0;
						while($r = $res->fetch_assoc()) {
							$i++;
							echo "
								<tr>
									<td>{$i}</td>
									<td>{$r["SNAME"]}</td>
									<td><a href='edit_sub.php?id={$r["SID"]}' class='btn'>Edit</a></td>
									<td><a href='sub_delete.php?id={$r["SID"]}' class='btnr'>Delete</a></td>
								</tr>
							";
						}
					} else {
						echo "<tr><td colspan='4'>No Record Found</td></tr>";
					}
				?>
			</table>
		</div>
	</div>
	<?php include "footer.php"; ?>
</body>
</html>
