<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readStudentData.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" type = "text/css" href = "">
    <title>View Student Data</title>

    <style type="text/css">
        body{
            background: #808080;
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
        <h1>Student data</h1>

        <br>

        <table align="center">
            <tr>
                <td>
                    <div class="courses-table">
                        <?php

                        echo "<table border='1px'><tr><th>Year</th><th>Graduation Rate</th></tr>";

                        include_once 'functions/dbh.inc.php';

                        $year = date("Y");
                        $diff = array(0,1,2,3,4,5);

                        foreach ($diff as $select){
                            $YearDiff = $diff;
                            $DiffCount = count($diff);
                        }

                        for ($att=0; $att<$DiffCount; $att++){
                            $theYear = $year - $diff[$att];

                            $sql2 = "SELECT * FROM student WHERE YearOfGraduation='$theYear'";
                            $result2 = $conn -> query($sql2);

                            $sql3 = "SELECT * FROM student WHERE YearOfGraduation='$theYear' AND Graduated='Yes'";
                            $result3 = $conn -> query($sql2);

                            $YearTotal = $result2 -> num_rows;
                            $GradTotal = $result3 -> num_rows;

                            if($GradTotal === 0){
                                $Rate = 'None';
                            } else if ($GradTotal > 0 && $YearTotal > 0){
                                $Fraction = $GradTotal / $YearTotal;
                                $Perc = $Fraction * 100;
                                $Final = number_format($Perc, 0);

                                $Rate = $Final."%";
                            }

                            echo "<tr><td>".$theYear."</td><td>".$Rate."</td></tr>";
                        }

                        echo "</table>";
                        ?>
                    </div>
                </td>
                <td>
                    <div class="courses-table">
                        <?php
                        if ($result5->num_rows > 0) {

                            echo "<table border='1px'><tr><th>Year</th><th>Semester</th><th>Major</th><th>Enrollment</th><th>Avg. GPA</th></tr>";

                            // output data of each row
                            while($row = $result5->fetch_assoc()) {
                                echo "<tr><td>".$row["SemesterPeriod"]."</td><td>".$row["Semester"]."</td><td>".$row["MajorName"]."</td><td>".$row["COUNT(*)"]."</td><td>".$row["GPA"]."</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No data";
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</section>
<br>

<form action='researcher.php'><input type='submit' value='Back'></form>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'})</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>

</body>
</html>