<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readProfCourses.php';

$result2 = (object) ['num_rows' => '0'];

?>

<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" type = "text/css" href = "">
    <title>View Students Enrollment</title>

    <style type="text/css">
        body{
            background: #B3B3B3;
        }

        .courses-table {
            font-size: 18px;
            text-align: left;
        }

        .courses {
            font-size: 18px;
            text-align: left;
        }
    </style>

    <script>
        function readStudents() {
            <?php
            if (isset($_POST['submit']))
            {
                include_once 'functions/dbh.inc.php';

                $CourseID = $_POST['CourseID'];

                //Error Handlers
                //Check for Empty Fields
                if (empty($CourseID)) {
                    echo ("<script LANGUAGE='JavaScript'>
   		    window.alert('Please select course');
    		</script>");
                    exit();
                }
                else
                {
                    $sql2 = "SELECT b.*, a.*, c.* FROM studentcourses as b INNER JOIN student as a ON (b.StudentEmail=a.EmailAddress) INNER JOIN attendence as c ON (b.StuCourseID = c.StudentCourseID) WHERE b.CourseID='$CourseID'";
                    $result2 = $conn->query($sql2);
                }
            }
            else {}
            ?>
        }
    </script>
</head>
<body>
<section class = "main-container">
    <div class = "main-wrapper">
        <h1 align="center">View Students Enrollment</h1>

        <br>

        <div align="center">
            <form onsubmit="readStudents()" method="post">
                <select name='CourseID'>
                    <option>Select course</option>

                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["CourseID"]."'>".$row["CourseName"]."</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
                <br /><br />
                <input type="submit" name="submit" value="Select Course">
                <br /><br />
            </form>
        </div>

        <div class="courses-table" align="center">
            <?php
            if ($result2->num_rows > 0) {
                echo "<table align='center' border='1px'><tr>
<th>Student Name</th>
<th>Student Email</th>
<th>Attendance Record</th>
<th>Add attendance</th>
<th></th></tr>";
                // output data of each row
                while($row = $result2->fetch_assoc()) {
                    echo "<tr><form action='functions/updateAttendance.php' method='post'>
<td>".$row["FirstName"]." ".$row["LastName"]."</td>
<td>".$row["StudentEmail"]."</td>
<td>".$row["AttendanceRecord"]."</td>
<td><input type='checkbox' name='attended' value='1' placeholder='Attendance record' /></td>
<td>
<input type='hidden' name='StuCourseID[]' value='".$row["StuCourseID"]."' />
<input type='submit' name='submit' value='Submit attendance'>
</td>
</form>
</tr>";
                }
                echo "</table>";
            } else {}
            ?>
                <br /><br />

        </div>
    </div>
</section>
<br>

<div align="center">
    <form action='facultypage2.php'><input type='submit' value='Back'></form>
</div>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'})</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>

</body>
</html>