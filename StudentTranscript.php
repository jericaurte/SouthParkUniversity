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
    <title>View Transcript</title>

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
        <h1>My Transcript</h1>

        <br>
        

        <div class="courses-table">
            <?php

            include_once 'functions/dbh.inc.php';

            if(!isset($_COOKIE["Email"])) {
                echo "Cookie named Email is not set!";
            } else {
                $Student = $_COOKIE["Email"];
            }

            $sql2 = "SELECT * FROM student WHERE EmailAddress='$Student'";
            $result2 = $conn->query($sql2);

            if ($result->num_rows > 0 && $result2->num_rows > 0) {
                echo "<table align='center' border='1px'><tr>
<th>Course ID</th>
<th>Course Name</th>
<th>Year</th>
<th>Semester</th>
<th>Mid Term Grade</th>
<th>Final Grade</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
<td>".$row["CourseID"]."</td>
<td>".$row["CourseName"]."</td>
<td>".$row["SemesterPeriod"]."</td>
<td>".$row["Semester"]."</td>
<td>".$row["MidTermGrade"]."</td>
<td>".$row["FinalGrade"]."</td></tr>";
                }

                while ($row2 = $result2 -> fetch_assoc()){
                    echo "<tr><td><b>GPA</b></td><td style='font-weight: 700'>".$row2['GPA']."</td><td style='border-left: none'></td><td style='border-left: none'></td><td style='border-left: none'></td><td style='border-left: none'></td></tr>";
                }

                echo "</table>";
            } else {
                echo "0 results";
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