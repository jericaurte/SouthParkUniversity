<?php
include_once 'functions/readMasterSchedule.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Master Schedule</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>

    <style>
        body {
            font-family: source-sans-pro;
            /*background-color: #808080;*/
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
            /*background-color: #808080;*/
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

        .dataTables_wrapper .dataTables_filter {
            visibility: hidden;
        }

        table.dataTable.hover tbody tr:hover, table.dataTable.display tbody tr:hover{
            background-color: #f2f2f2;
            color: #fff;
        }

        table.dataTable.hover tbody tr:hover.selected, table.dataTable.display tbody tr:hover.selected {
            background-color: #f2f2f2;
            color: #fff;
        }

        table.dataTable.display tbody tr:hover > .sorting_1, table.dataTable.order-column.hover tbody tr:hover > .sorting_1 {
            background-color: #f2f2f2;
            color: #fff;
        }
    </style>
    <style>
        .myInput {
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 20%; /* Full-width */
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
            var input1, filter1, table, tr, td1, i;
            input1 = document.getElementById("myInput");
            filter1 = input1.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td1 = tr[i].getElementsByTagName("td")[1];

                if (td1) {
                    if (td1.innerHTML.toUpperCase().indexOf(filter1) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        
        function myFunction1() {
            // Declare variables
            var input2, filter2, table, tr, td2, i;
            input2 = document.getElementById("myInput1");
            filter2 = input2.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {

                td2 = tr[i].getElementsByTagName("td")[2];

                if (td2) {
                    if (td2.innerHTML.toUpperCase().indexOf(filter2) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        
        function myFunction3() {
            // Declare variables
            var input5, filter5, table, tr, td5, i;
            input5 = document.getElementById("myInput3");
            filter5 = input5.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td5 = tr[i].getElementsByTagName("td")[5];

                if (td5) {
                    if (td5.innerHTML.toUpperCase().indexOf(filter5) > -1) {
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
    <!-- Navigation -->
    <header>
        <a href="index.php">
            <h4 class="logo">SOUTH PARK UNIVERSITY</h4>
        </a>
        <nav>
            <ul>
                <li><a href="https://www.oldwestbury.edu/sites/default/files/documents/Catalogs/2016-18/undergrad-catalog-16-18.pdf">View Catalog</a></li>
                <li><a href="loggingin.php">Log in </a></li>
            </ul>
        </nav>
    </header>

    <section class="main-container">
        <!-- Edit Style of the Search Boxes here -->
    </section>

    <div id="viewAll">
        <input type="text" class="myInput" id="myInput" onkeyup="myFunction()" placeholder="Search by Course ID">
        <input type="text" class="myInput" id="myInput1" onkeyup="myFunction1()" placeholder="Search by Course Name">
        <input type="text" class="myInput" id="myInput3" onkeyup="myFunction3()" placeholder="Search by Professor">

        <table id="myTable">
            <thead class="header">
                <th style="background-color: #f2f2f2; color:#000;">TERM</th>
                <th style="background-color: #f2f2f2; color:#000;">COURSE ID</th>
                <th style="background-color: #f2f2f2; color:#000;">COURSE</th>
                <th style="background-color: #f2f2f2; color:#000;">DESCRIPTION</th>
                <th style="background-color: #f2f2f2; color:#000;">CREDITS</th>
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
                        <td class='tbldata'>".$row["CourseID"]."</td>
                        <td class='tbldata'>".$row["CourseName"]."</td>
                        <td class='tbldata'>".$row["CourseDescription"]."</td>
                        <td class='tbldata'>".$row["Credits"]."</td>
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
    <div class="copyright"><p><center>&copy;2018 - <strong>Best System Design Group</strong></center></p</div>
</div>
</body>
</html>

