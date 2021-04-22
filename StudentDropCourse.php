<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readMyCourses.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
</head>

<body bgcolor="#B3B3B3">
<h1 align="center">Drop courses</h1>

<div class="courses-table" align="center">
    <?php
    if ($result->num_rows > 0) {
        echo "<table align='center' border='1px'><tr>
<th>Section ID</th>
<th>Course ID</th>
<th>Course Name</th>
<th>Room</th>
<th>Day</th>
<th>Time</th>
<th></th>
</tr>";

        // Calculate Percentage
        while($row = $result->fetch_assoc()) {
            echo "<tr>
<td>".$row["SectionId"]."</td>
<td>".$row["CourseID"]."</td>
<td>".$row["CourseName"]."</td>
<td>".$row["RoomNo"]."</td>
<td>".$row["Days"]."</td>
<td>".$row["Time"]."</td>
<td>
<form action='functions/studentDropCourse.php' method='POST'>
<input type='hidden' name='StuCourseID' value='".$row["StuCourseID"]."'>
<button type='submit' name='submit' value='Remove'>Drop course</button>
</form>
</td>
</tr>";
        }
        echo "</table>";
    } else {
        echo "No data";
    }
    ?>
</div>
<br /><br /><br />

<div align="center">
    <a href= "Student.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a>
</div>
</body>
</html>