<?php
if (isset($_COOKIE['Email']) || isset($_COOKIE['FacultyID'])) {
	unset($_COOKIE['Email']);
	unset($_COOKIE['FacultyID']);
	setcookie('Email', '', time() - 3600, '/'); // empty value and old timestamp
	setcookie('FacultyID', '', time() - 3600, '/'); // empty value and old timestamp
}
?>

<html>
<head>
	<title>Sign In</title>

	<style>
		body {
			font-family: source-sans-pro;
			background-color: #f2f2f2;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			margin-left: 0px;
			font-style: normal;
			font-weight: 200;
		}
		header {
			width: 100%;
			height: 15%;
			background-color: #3F7EED;
			border-bottom: 1px solid #3F7EED;
		}
		.logo {
			color: #fff;
			font-weight: bold;
			text-align: left;
			font-size: 25px;
			width: 30%;
			height: 30%;
			float: left;
			margin-top: 25px;
			margin-bottom: 20px;
			margin-left: 30px;
			letter-spacing: 2px;

		}
		nav {
			float: right;
			width: 50%;
			text-align: right;
			margin-right: 25px;
			margin-top: 30px;
		}
		header nav ul {
			list-style: none;
			float: right;
		}
		nav ul li {
			float: left;
			color: #FFFFFF;
			font-size: 14px;
			text-align: left;
			margin-right: 25px;
			letter-spacing: 2px;
			font-weight: bold;
			transition: all 0.3s linear;
		}
		form {
			margin: auto;
			text-align:center;
			width: 500px;
			margin-top: 50px;
			margin-bottom: 50px;
		}
		.copyright {
			margin-top: auto;
			text-align: center;
			padding-top: 20px;
			padding-bottom: 20px;
			background-color: #717070;
			color: #FFFFFF;
			text-transform: uppercase;
			font-weight: lighter;
			letter-spacing: 2px;
			border-top-width: 2px;}
	</style>

</head>
<body>
<header> <a href="index.php">
		<h4 class="logo">SOUTH PARK UNIVERSITY</h4>
	</a>
	<nav>
		<ul>
			<li><a href="http://www.southparkuniversity.com/index.php">HOME</a></li>
		</ul>
	</nav>
</header>

<div class="row">
	<div class="col-lg-6">
		<div class="bs-component">
			<form action="functions/sendUser.php" method="post">
				<fieldset>
					<legend>Sign In</legend>
					<div class="form-group">
						<label for="username">Email</label>
						<input type="email" class="form-control" id="username" name="email" placeholder="Enter Email">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<button type="submit" name="submit">Submit</button>
				</fieldset>
			</form>
		</div>
	</div>
	<footer>
		<div class="copyright"><p><center>&copy;2018 - <strong>Best System Design Group</strong></center></p</div>
	</footer>
</div>
</body>
</html>