<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readSemester.php';

$result3 = (object) ['num_rows' => '0'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>

    <script>
        function getCourses() {
            <?php
            include_once 'functions/dbh.inc.php';

            if(isset($_POST['submit'])){
                $Dept = $_POST['Department'];

                $sql3 = "SELECT a.*, b.*, c.*, d.* FROM course as a INNER JOIN section as b ON (a.CourseID = b.CourseID) INNER JOIN room as c ON (b.RoomID = c.RoomID) INNER JOIN timeslots as d ON (b.DayTimeID = d.DayTimeID) WHERE DeptID='$Dept'";
                $result3 = $conn->query($sql3);
            }
            ?>
        }
    </script>
</head>

<body bgcolor="#B3B3B3">
<h1 align="center">Select all courses you want</h1>

<table align="center" cellpadding = "20">
    <thead>
    <th>Courses list</th>
    </thead>

    <tr>
        <td>
            <form onsubmit="getCourses()" method="post">
                <select name="Department">
                    <option>Select department first</option>

                    <?php

                    include_once 'functions/dbh.inc.php';

                    $sql2 = "SELECT * FROM department";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) {
                            echo "<option value='".$row["DepartmentID"]."'>".$row["DeptName"]."</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>

                <input type="submit" name="submit" value="Get courses">
            </form>
        </td>
    </tr>

    <form action="functions/studentAddCourse.php" method="POST">
        <tr>
            <td>
                <select name="Semester" required>
                    <option>Select semester</option>

                    <?php
                    if ($result5->num_rows > 0) {
                        while($row = $result5->fetch_assoc()) {
                            echo "<option value='".$row["SemesterID"]."'>".$row["SemesterPeriod"]."-".$row["Month"].", ".$row["Semester"]."</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <table id="myTable" border="1px">
                    <thead class="header">
                    <th>Select</th>
                    <th>Course</th>
                    <th>Days</th>
                    <th>Time</th>
                    <th>Location</th>
                    </thead>
                    <tbody>
                    <?php
                    if ($result3->num_rows > 0) {
                        // output data of each row
                        while($row = $result3->fetch_assoc()) {
                            echo "<tr>
                        <td>
                        <input type='checkbox' name='SectionID[]' value='".$row["SectionId"]."'>
                        <input type='hidden' name='CourseID[]' value='".$row["CourseID"]."'>
                                                <input type='hidden' name='Credits[]' value='".$row["Credits"]."'>
                        </td>
                        <td>".$row["CourseName"]."</td>
                        <td>".$row["Days"]."</td>
                        <td>".$row["Time"]."</td>
                        <td>".$row["BuildingID"]." - ".$row["RoomNo"]."</td></tr>";
                        }
                    } else {
                        echo "No data";
                    }
                    ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit" value="Add">Add courses</button>
            </td>
        </tr>
    </form>
    <tr>
        <td>
            <a href= "Student.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a>
        </td>
    </tr>
</table>

</body>
</html>