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
	background-color: #FFFFFF;;
        }

        .button:hover {background-color: #0073e6}

        .button:active {
            background-color: #0073e6;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
</head>
<body>
</br>
<h1 align="center">Create New User</h1>
</br>
<div align ="center">
    <a href="AdminUserPage.php"><button class="button">ADMIN</button></a>
    <a href="FacultyUserPage.php"><button class="button">FACULTY</button></a>
    <a href="AddStudent.php"><button class="button">STUDENT</button></a>
    <a href="ResearcherUserPage.php"><button class="button">RESEARCHER</button></a>
</div>
</br><br>
<center><a href= "Admin.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a></center>


</body>
</html>