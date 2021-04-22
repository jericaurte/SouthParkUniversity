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
	<title>Admin View</title>
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
    <h1 class="welcome">Welcome to Admin Page!</h1>
    <br>
    <br>


    <a href="AddCourse.php" class="button">Add Course</a>
 
    <a href="removeCourse.php" class="button">Remove Course</a>
    
    <a href="viewcourses.php" class="button">View Courses</a>

    <a href="CreateUser.php" class="button">Create User</a>
   <a href="ViewUsers.php" class="button">View Users</a>
   <br><br><br><br>
    <a href="UpdateStudent.php" class="button">Update Student</a>
   
    
    
    <a href="RemoveUser.php" class="button">Remove User</a>

    <a href="AddHold.php" class="button">Add Hold</a>

    <a href="RemoveHold.php" class="button">Remove Hold</a>

    <a href="Viewholds.php " class="button">View Hold</a>
  
    <a href="ViewGrades.php" class="button">Modify/View Grades</a>
    <br><br><br><br>
    <a href="updatecourseinformation.php" class="button">Update Course Information</a>
    
    <a href="coursesection.php" class="button">Add Section</a>
    
    <a href="ViewSections.php" class="button">View Section</a>

    <br><br><br><br>
    <br><br><br><br>

    <center><a href="loggingin.php" class="button">Logout</a></center>
  

  </section>

  
<!--  Footer -->
  <div class="copyright">&copy;2018 - <strong>Best System design group</strong></div>
</div>
</body>
</html>