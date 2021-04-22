<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readForSections.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Course section</title>

    <style type="text/css">
        body{
            padding-top: 20px;
            background: #B3B3B3;
            padding-left: auto;
        }

        label{
            color: #3F7EED;
        }

        button{
            width: 150px;
            height: 50px;
        }


        h1{
            text-align: center;
        }

        form {
            text-align: center;
            font-size: 20px;
        }

        select{
            font-size: 20px;
        }
    </style>
</head>

<body>
<h1>Course Section</h1>
<br>

<form action="functions/addSection.php" method="POST">

    <label>Course:</label>
    <select name="Course">
        <option>Select</option>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["CourseID"]."'>".$row["CourseName"]."</option>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </select> <br> <br>
    <label>Room:</label>
    <select name="Room">
        <option>Select</option>

        <?php
        if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                echo "<option value='".$row["RoomID"]."'>".$row["BuildingID"].", ".$row["RoomType"].", ".$row["AmountOfSeats"]."</option>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </select>
    <br> <br>

    <label>Semester:</label>
    <select name="Semester">
        <option>Select</option>

        <?php
        if ($result3->num_rows > 0) {
            while($row = $result3->fetch_assoc()) {
                echo "<option value='".$row["SemesterID"]."'>".$row["SemesterPeriod"].", ".$row["Semester"]."</option>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </select> <br> <br>

    <label>Faculty Professor:</label>
    <select name="FacultyName">
        <option>Select</option>

        <?php
        if ($result4->num_rows > 0) {
            while($row = $result4->fetch_assoc()) {
                echo "<option value='".$row["ProfessorID"]."'>".$row["ProfFirstName"]." ".$row["ProfLastName"]."</option>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </select> <br> <br>

    <label>Day/Time:</label>
    <select name="DayTime">
        <option>Select</option>

        <?php
        if ($result5->num_rows > 0) {
            while($row = $result5->fetch_assoc()) {
                echo "<option value='".$row["DayTimeID"]."'>".$row["Days"]." - ".$row["Time"]."</option>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </select> <br> <br>

    <input type="submit"  name="submit" value="Add Section">
</form>
<br>
<form action="Admin.php"><input type="submit" value="Back"></form>

<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</body>
</html>