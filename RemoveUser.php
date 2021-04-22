<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<!DOCTYPE html>
<html>
<body bgcolor="#B3B3B3">
<html>
<head>
<meta name = "viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  width: 200px;
	margin-top: 40px;
	margin-right: auto;
	margin-bottom: auto;
	margin-left: auto;
	padding-top: 20px;
	padding-right: 10px;
	padding-bottom: 20px;
	padding-left: 10px;
	text-align: center;
	vertical-align: middle;
	border-radius: 20px;
	text-transform: uppercase;
	font-weight: bold;
	letter-spacing: 2px;
	border: 3px solid #FFFFFF;
	color:  #3F7EED;
	transition: all 0.3s linear;
	background-color: #FFFFFF;
}

.button:hover {background-color: #0073e6}

.button:active {
  background-color: #0073e6;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
body{
text-align:center;

}
</style>
</head>
<body>

<h1 align="Remove User">Remove User!</h1>

<a href="removeAdmin.php"><button class="button">ADMIN</button></a>
<a href="removeFaculty.php"><button class="button">FACULTY</button></a>
<a href="removeStudent.php"><button class="button">STUDENT</button></a>
<a href="removeResearcher.php"><button class="button">RESEARCHER</button></a>
<br><br><br>
<center><a href= "Admin.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a></center>
</body>
</html>
