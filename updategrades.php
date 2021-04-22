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
    <title>Update Grades</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        body {
            font-family: source-sans-pro;
            background-color: #B3B3B3;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
            font-style: normal;
            font-weight: 200;

        }
        .container {
            width: 95%;
            margin-left: auto;
            margin-right: auto;
            height: 1000px;
            background-color: #B3B3B3;
        }

        header {
            width: 100%;
            height: 10%;
            background-color: #3F7EED;
            border-bottom: 1px solid #3F7EED;
        }
        .logo {
            color: #fff;
            font-weight: bold;
            text-align: left;
            font-size: 25px;
            width: 30%;
            height: 30%;
            float: left;
            margin-top: 25px;
            margin-bottom: 20px;
            margin-left: 30px;
            letter-spacing: 2px;

        }
        nav {
            float: right;
            width: 60%;
            text-align: left;
            margin-right: 20px;
            margin-top: 30px;

        }
        header nav ul {
            list-style: none;
            float: right;
        }
        nav ul li {
            float: left;
            color: #FFFFFF;
            font-size: 14px;
            text-align: left;
            margin-left: 0px;
            margin-right: 20px;
            letter-spacing: 1px;
            font-weight: bold;
            transition: all 0.3s linear;
        }
        ul li a {
            color: #FFFFFF;
            text-decoration: none;
        }
        ul li:hover a {
            color: #3F7EED;
        }
        .center {
            display: block;
            margin-top: 10px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #717070;
            color: #FFFFFF;
            text-transform: uppercase;
            font-weight: lighter;
            letter-spacing: 2px;
            border-top-width: 2px;
        }

        #myInput {
            background-image: url('/img/searchicon.png'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 95.15%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 12px 20px 12px 40px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-bottom: 12px; /* Add some space below the input */
        }

        #myTable {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full-width */
            border: 1px solid #ddd; /* Add a grey border */
            font-size: 18px; /* Increase font-size */
        }

        #myTable th, #myTable td {
            text-align: left; /* Left-align text */
            padding: 12px; /* Add padding */
        }

        #myTable tr {
            /* Add a bottom border to all table rows */
            border-bottom: 1px solid #ddd;
        }

        #myTable tr.header, #myTable tr:hover {
            /* Add a grey background color to the table header and on hover */
            background-color: #f1f1f1;
        }
    </style>
    <script>
        function readStudents() {
            <?php

            if (isset($_POST['submit']))
            {
                include_once 'functions/dbh.inc.php';

                if(!isset($_COOKIE["FacultyID"])) {
                    echo "Cookie is not set!";
                } else {
                    $ProfID = $_COOKIE["FacultyID"];
                }

                $CourseID = $_POST['CourseID'];

                //Error Handlers
                //Check for Empty Fields
                if (empty($CourseID)) {
                    echo ("<script LANGUAGE='JavaScript'>
   		    window.alert('Please select course');
    		</script>");
                    exit();
                }
                else {
                    $sql2 = "SELECT b.*, a.*, c.*, d.* FROM studentcourses as b INNER JOIN course as a ON (b.CourseID=a.CourseID) INNER JOIN semester as c ON (b.SemesterID=c.SemesterID) INNER JOIN section as d ON (b.CourseID=d.CourseID) WHERE d.ProfessorID='$ProfID' AND b.CourseID='$CourseID' ORDER BY c.SemesterPeriod, c.Month DESC";
                    $result2 = $conn->query($sql2);
                }
            }
            else {}
            ?>
        }
    </script>
</head>
<body>
<div class = "container">
    <div class = "main-wrapper">
        <center><h1>Add/Update Grades</h1></center>

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

        <br /><br />

        <div class="viewAll">

            <table id="myTable">
                <thead class="header">
                <th style="background-color: #f2f2f2; color:#000;">Semester</th>
                <th style="background-color: #f2f2f2; color:#000;">Student</th>
                <th style="background-color: #f2f2f2; color:#000;">Course</th>
                <th style="background-color: #f2f2f2; color:#000;">Mid-Term Grade</th>
                <th style="background-color: #f2f2f2; color:#000;">Final Grade</th>
                <th></th>
                </thead>
                <tbody>
                <?php
                if ($result2->num_rows > 0) {
                    // output data of each row
                    while($row = $result2->fetch_assoc()) {
                        echo "<tr><form action='functions/updateGrades.php' method='post'>
                        <td class='tbldata'>".$row["SemesterPeriod"]." ".$row["Semester"]."</td>
                        <td class='tbldata'>".$row["StudentEmail"]."</td>
                        <td class='tbldata'>".$row["CourseName"]."</td>
                        <td class='tbldata'>".$row["MidTermGrade"]." - 
                        <select name='MidTerm[]'>
                        <option>Select</option>
                        <option value='S'>S</option>
                        <option value='U'>U</option>
                        </select>
                        </td>                   
                        <td class='tbldata'>".$row["FinalGrade"]." - 
                        <select name='Final[]'>
                        <option>Select</option>
                        <option value='A'>A</option>
                        <option value='B'>B</option>
                        <option value='C'>C</option>
                        <option value='D'>D</option>
                        <option value='E'>E</option>
                        <option value='I'>I</option>
                        </select>                       
                        </td>
                        <td>
                        <input type='hidden' name='StuCourseID[]' value='".$row["StuCourseID"]."'>
                        <input type='submit' name='submit' value='Update'>
                        </td>
                        </form>
                        </tr>";
                    }
                } else {
                    echo "";
                }
                ?>
                </tbody>
            </table>
        </div>

        <br /><br />
        <div align="center">
            <form action='facultypage2.php'><input type='submit' value='Go home'></form>
        </div>
        <br /><br />
    </div>
</div>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'})</script>
<script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>

</body>
</html>