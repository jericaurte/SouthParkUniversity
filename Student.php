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
	<title>Student View</title>
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
    <h1 class="welcome">Welcome to Student Page!</h1>
    <br>
    <br>


    <a href="studentschedule.php" class="button">Student Schedule</a>
 
    <a href="StudentTranscript.php" class="button">Student Transcript</a>
    
    <a href="studentholds.php" class="button">Student Hold</a>

    <a href="StudentAddCourse.php" class="button">Add Course</a>
     <br><br><br><br>

    <a href="StudentDropCourse.php" class="button">Drop Course</a>
 
    <a href="studentadvisor.php" class="button">Advisor</a>
    
    <a href="studentgrades.php" class="button">Grades</a>
   

    <br><br><br><br>
    <br><br><br><br>

    <center><a href="loggingin.php" class="button">Logout</a></center>
  

  </section>

  
<!--  Footer -->
  <div class="copyright">&copy;2018 - <strong>Best System design group</strong></div>
</div>
</body>
</html>