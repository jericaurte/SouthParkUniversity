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
    <link rel= "stylesheet" type = "text/css" href = "">
    <title>View Courses</title>

    <style type="text/css">
        body{
            background: #B3B3B3;
        }
        div{
            text-align: center;
            font-size: 50px;
        }

        form {
            text-align: center;
        }

        h1{
            text-align: center;
            font-size: 50px;
        }

        .courses-table {
            font-size: 18px;
            text-align: left;
        }
    </style>
</head>
<body>
<section class = "main-container">
    <div class = "main-wrapper">
        <h1>My Courses</h1>

        <br>

        <div class="courses-table" align="center">
            <?php
            if ($result-> num_rows > 0) {
                echo "<table align='center' border='1px'><thead>
<th>Course ID</th>
<th>Course Name</th>
<th>Department</th>
<th>Professor</th>
<th>Building</th>
<th>Room</th>
<th>Day</th>
<th>Time</th>
</thead>";

                // Calculate Percentage
            while($row = $result->fetch_assoc()) {
                echo "<tbody><tr>
<td>".$row["CourseID"]."</td>
<td>".$row["CourseName"]."</td>
<td>".$row["DeptName"]."</td>
<td>".$row["ProfFirstName"]." ".$row["ProfLastName"]."</td>
<td>".$row["BuildingID"]."</td>
<td>".$row["RoomNo"]."</td>
<td>".$row["Days"]."</td>
<td>".$row["Time"]."</td>
</tr></tbody>";
            }
                echo "</table>";
            } else {
                echo "<p align='center'>No data</p>";
            }
            ?>
        </div>
    </div>
</section>
<br>

<form action='Student.php'><input type='submit' value='Back'></form>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'})</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>

</body>
</html>