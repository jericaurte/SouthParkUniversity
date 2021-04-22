<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readAdviseeStudents.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" type = "text/css" href = "">
    <title>View students</title>
    <style type="text/css">
        body{
            background: #B3B3B3;
        }

        form {
            text-align: center;
        }

        h1{
            text-align: center;
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
        <h1>Display Students</h1>

        <br>

        <div class="courses-table">
            <?php
            if ($result->num_rows > 0) {
                echo "<table align='center' border='1px'><tr><th>Student Name</th><th>Student Email</th><th>Major</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["EmailAddress"]."</td><td>".$row["Major"]."</td></tr>";
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

<form action='facultypage2.php'><input type='submit' value='Back'></form>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'})</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</body>
</html>
