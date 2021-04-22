<?php
if (isset($_COOKIE['Email'])) {}else{
	echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
	exit();
}
?>

<?php
include_once 'functions/readMajor.php';
?>

<!DOCTYPE html>
<html>
<head>
</head>

<body bgcolor="#B3B3B3">
<h1 align="center">Enter Student Information</h1>
<form action="functions/AddStudentValidate.php" method="POST">
	<table align="center" cellpadding = "20">
		<!----- First Name-------------->
		<tr>
			<td>First Name</td>
			<td><input type="text" name="firstName" maxlength="50" /></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" name="lastName" maxlength="50" /></td>
		</tr>
		<tr>
			<td>Birthday</td>
			<td><input type="date" value="" name="birthday" id="birthday" /></td>
		</tr>
		<tr>
			<td>Email Address</td>
			<td><input type="email" name="email" maxlength="50" /></td>
		</tr>
		<tr>
			<td>Enter Temporary Password</td>
			<td><input type="password" name="password" maxlength="50" /></td>
		</tr>
		<tr>
			<td>Select Student Major</td>
			<td>
				<select id="major" name="major">
					<option>Select</option>
					<?php
					if ($result5->num_rows > 0) {
						while($row = $result5->fetch_assoc()) {
							echo "<option value='".$row["MajorID"]."'>".$row["MajorName"]."</option>";
						}
					} else {
						echo "0 results";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Status:</td>
			<td>
				<select name="Status" id="Status">
					<option>Select</option>
					<option value="Full Time">Full Time</option>
					<option value="Part Time">Part Time</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Assign Advisor</td>
			<td>
				<select id="advisor" name="advisor">
					<option>Select</option>
					<?php

					include_once 'functions/dbh.inc.php';

					$sql6 = "SELECT * FROM professor";
					$result6 = $conn ->query($sql6);

					if ($result6->num_rows > 0) {
						while($row = $result6->fetch_assoc()) {
							echo "<option value='".$row["ProfessorID"]."'>".$row["ProfFirstName"]." ".$row["ProfLastName"]."</option>";
						}
					} else {
						echo "0 results";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Enter Start Year</td>
			<td><input type="number" name="StartYear" maxlength="50" /></td>
		</tr>
		<tr>
			<td>Enter End Year</td>
			<td><input type="number" name="EndYear" maxlength="50" /></td>
		</tr>
		<tr>
			<td>
				<button type="submit" name="submit" value="Create">Submit</button>
			</td>
		</tr>
		<tr>
			<td>
				<a href= "CreateUser.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a>
			</td>
		</tr>
	</table>
</form>
</body>
</html>