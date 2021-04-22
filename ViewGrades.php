<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
$result1 = (object) ['num_rows' => '0'];
?>
<html>
<head>
    <title> Student Grades </title>

    <script>
        function filterArray() {
            <?php
            if (isset($_POST['submit']))
            {
                include_once 'functions/dbh.inc.php';

                $Email = $_POST['email'];

                //Error Handlers
                //Check for Empty Fields
                if (empty($Email)) {
                    echo ("<script LANGUAGE='JavaScript'>
   		    window.alert('Please fill in student email');
    		window.location.href='http://southparkuniversity.com/RemoveHold.php';
    		</script>");
                    exit();
                }
                else
                {
                    //Insert Into Course Table
                    $sql1 = "SELECT a.*, b.*, c.*, d.* FROM studentcourses as a INNER JOIN semester as b ON (a.SemesterID = b.SemesterID) INNER JOIN course as c ON (a.CourseID = c.CourseID) INNER JOIN student as d ON (a.StudentEmail = d.EmailAddress) WHERE d.EmailAddress='$Email'";
                    $result1 = $conn->query($sql1);
                    $result3 = $conn->query($sql1);
                }
            }
            else {}
            ?>
        }
    </script>
</head>

<body bgcolor="#B3B3B3">
<section class = "main-container">
    <div class = "main-wrapper" align="center">
    <br>
        <h1 align="center">View/Modify Student Grades</h1>

        <br>

        <form onsubmit="filterArray()" method="post">
            <input type="email" style="width: 300px; height: 30px" name="email" value="" placeholder="Enter student email">
            <input type="submit" name="submit" value="Search Student">
        </form>
        <br /><br />

        <div class="courses-table">
            <?php
            if ($result1->num_rows > 0) {
                echo "<table align='center' border='1px'><tr>
<th>Student ID</th>
<th>Student Name</th>
<th>Course</th>
<th>Semester</th>
<th>Mid Term Grade</th>
<th>Final Grade</th>
<th></th>
</tr>";
                // output data of each row
                while($row = $result1->fetch_assoc()) {
                    echo "<tr><form action='functions/updateStudent.php' method='post'>
<td>".$row["StudentID"]."</td>
<td>".$row["FirstName"]." ".$row["LastName"]."</td>
<td>".$row["CourseName"]."</td>
<td>".$row["SemesterPeriod"]." - ".$row["Semester"]."</td>
<td>".$row["MidTermGrade"]." - 
                        <select name='MidTerm[]'>
                        <option>Select</option>
                        <option value='S'>S</option>
                        <option value='U'>U</option>
                        </select>
                        </td>
<td>".$row["FinalGrade"]." - 
                        <select name='Final[]'>
                        <option>Select</option>
                        <option value='A'>A</option>
                        <option value='B'>B</option>
                        <option value='C'>C</option>
                        <option value='D'>D</option>
                        <option value='E'>E</option>
                        <option value='I'>I</option>
                        </select>                       
                        </td>
                        <td>
                        <input type='hidden' name='StuCourseID[]' value='".$row["StuCourseID"]."'>
                        <input type='submit' name='submit' value='Update'>
                        </td>
                        </form>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <br /><br />
    <div align="center">
        <form action='Admin.php'><input type='submit' value='Back'></form>
    </div>
</section>
</body>
</html>