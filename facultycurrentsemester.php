<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readFacultySchedule.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" type = "text/css" href = "">
    <title>View Schedule</title>
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
        <h1 align="center">Display Schedule</h1>

        <br>

            <div class="courses-table" align="center">
                <?php
                if ($result2->num_rows > 0) {
                    echo "<table align='center' border='1px'><tr><th>Current semester courses</th><th>Day</th><th>Time</th><th>Room</th></tr>";
                    // output data of each row
                    while($row2 = $result2->fetch_assoc()) {
                        echo "<tr><td>".$row2["CourseName"]."</td><td>".$row2["Days"]."</td><td>".$row2["Time"]."</td><td>".$row2["RoomNo"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p align='center'>No results on current semester</p>";
                }
                ?>
            </div>
            <br />
            <div class="courses-table" align="center">
                <?php
                if ($result->num_rows > 0) {
                    echo "<table align='center' border='1px'><tr><th>Last semester courses</th><th>Day</th><th>Time</th><th>Room</th></tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["CourseName"]."</td><td>".$row["Days"]."</td><td>".$row["Time"]."</td><td>".$row["RoomNo"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p align='center'>No results on last semester</p>";
                }
                ?>
            </div>
            <br />
            <div class="courses-table" align="center">
                <?php
                if ($result3->num_rows > 0) {
                    echo "<table align='center' border='1px'><tr><th>Next semester courses</th><th>Day</th><th>Time</th><th>Room</th></tr>";
                    // output data of each row
                    while($row3 = $result3->fetch_assoc()) {
                        echo "<tr><td>".$row3["CourseName"]."</td><td>".$row3["Days"]."</td><td>".$row3["Time"]."</td><td>".$row3["RoomNo"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p align='center'>No results on next semester</p>";
                }
                ?>
            </div>
        </div>
</section>
<br>

<form action='facultypage2.php'><input type='submit' value='Back'></form>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'})</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</body>
</html>
