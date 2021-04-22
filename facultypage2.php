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
<head>
	<title>Faculty View</title>
	<link href="singlePageTemplate.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container"> 
  <!-- Navigation -->
  <header> <a href="index.php">
    <h4 class="logo">SOUTH PARK UNIVERSITY</h4>
    </a>
    <nav>
      <ul>

        <li><a href="https://www.oldwestbury.edu/sites/default/files/documents/Catalogs/2016-18/undergrad-catalog-16-18.pdf">View Catalog</a></li>
        <li><a href="ViewMasterSchedule.php">Master Schedule</a></li>

        <li> <a href="loggingin.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <section class="hero" id="hero">
    <h1 class="welcome">Welcome to Faculty Page!</h1>
    <br>
    <br>


    <a href="facultycurrentsemester.php" class="button">Faculty Teaching Schedule</a>
 
    <a href="updategrades.php" class="button">Update Grades</a>
    
    <a href="studentenrollement.php" class="button">Student Enrollment</a>

    <a href="facultyadvisor.php" class="button">Advising List</a>
   

    <br><br><br><br>
    <br><br><br><br>

    <center><a href="loggingin.php" class="button">Logout</a></center>
  

  </section>

  
<!--  Footer -->
  <div class="copyright">&copy;2018 - <strong>Best System design group</strong></div>
</div>
</body>
</html>