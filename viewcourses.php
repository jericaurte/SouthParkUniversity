<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readCourses.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Courses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

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
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body>
<div class="container">

    <h1 align="center">View Courses</h1>

    <br>

    <div id="viewAll">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by course name">

        <table id="myTable">
            <thead class="header">
            <th style="background-color: #f2f2f2; color:#000;">TERM</th>
            <th style="background-color: #f2f2f2; color:#000;">DEPARTMENT</th>
            <th style="background-color: #f2f2f2; color:#000;">COURSE</th>
            <th style="background-color: #f2f2f2; color:#000;">DESCRIPTION</th>
            <th style="background-color: #f2f2f2; color:#000;">PREREQUISITE</th>
            <th style="background-color: #f2f2f2; color:#000;">PROFESSOR</th>
            <th style="background-color: #f2f2f2; color:#000;">BUILDING</th>
            <th style="background-color: #f2f2f2; color:#000;">ROOM</th>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td class='tbldata'>".$row["SemesterPeriod"]." ".$row["Semester"]."</td>
                        <td class='tbldata'>".$row["DeptName"]."</td>
                        <td class='tbldata'>".$row["CourseName"]."</td>
                        <td class='tbldata'>".$row["CourseDescription"]."</td>
                        <td class='tbldata'>".$row["PreReqCourse"]."</td>
                        <td class='tbldata'>".$row["ProfFirstName"]." ".$row["ProfLastName"]."</td>
                        <td class='tbldata'>".$row["BuildingID"]."</td>
                        <td class='tbldata'>".$row["RoomNo"]."</td></tr>";
                }
            } else {
                echo "No data";
            }
            ?>
            </tbody>
        </table>
    </div>
    <br />
    <div align="center">
        <form action='Admin.php'><input type='submit' value='Go Back to Previous Page'></form>
    </div>
    <br /><br /><br />
</div>
</body>
</html>

