<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readMyCurrentCourses.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" type = "text/css" href = "">
    <title>View Grades</title>

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
            margin: 0 35% 0 35%;
            font-size: 18px;
            text-align: left;
        }
    </style>
</head>
<body>
<section class = "main-container">
    <div class = "main-wrapper">
        <h1>My Grades</h1>

        <br>

        <div class="courses-table">
            <?php
            if ($result->num_rows > 0) {
                echo "<table border='1px'><tr><th>Course Name</th><th>Mid Term Grade</th><th>Final Grade</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["CourseName"]."</td><td>".$row["MidTermGrade"]."</td><td>".$row["FinalGrade"]."</td></tr>";
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