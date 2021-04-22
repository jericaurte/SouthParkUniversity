<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readFacultyData.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel= "stylesheet" type = "text/css" href = "">
    <title>View Faculty Data</title>

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
        <h1>Faculty data</h1>

        <br>

        <table align="center">
            <tr>
                <td>
                    <div class="courses-table">
                        <?php
                        if ($result3->num_rows > 0) {
                            echo "<table border='1px'><tr><th>Semester</th><th>Total faculty</th></tr>";

                            while ($row = $result3->fetch_assoc()){
                                echo "<tr><td>".$row['SemesterPeriod']." - ".$row['Semester']."</td><td>".$row['COUNT(*)']."</td></tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "No data";
                        }
                        ?>
                    </div>
                </td>
                <td>
                    <div class="courses-table">
                        <?php
                        if ($result4->num_rows > 0) {
                            echo "<table border='1px'><tr><th>Department</th><th>Total faculty</th></tr>";

                            while ($row = $result4->fetch_assoc()){
                                echo "<tr><td>".$row['DeptName']."</td><td>".$row['COUNT(*)']."</td></tr>";
                            }

                            echo "</table>";
                        } else {
                            echo "No data";
                        }
                        ?>
                    </div>
                </td>
                <td>
                    <div class="courses-table">
                        <?php
                        if ($result5->num_rows > 0) {
                            echo "<table border='1px'><tr><th>Course</th><th>Total faculty</th></tr>";

                            while ($row = $result5->fetch_assoc()){
                                echo "<tr><td>".$row['CourseName']."</td><td>".$row['COUNT(*)']."</td></tr>";
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