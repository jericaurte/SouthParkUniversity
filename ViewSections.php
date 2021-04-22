<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readSections.php';
?>
<html>
<head>
<style>
	body{
            padding-top: 20px;
            background: #B3B3B3;
            padding-left: auto;
        }
</style>
    <title>View Sections</title>
</head>

<body bgcolor="#B3B3B3">
<section class = "main-container">
    <div class = "main-wrapper" align="center">
        <h1 align="center">View Sections</h1>

        <br>

        <div class="courses-table">
            <?php
            if ($result->num_rows > 0) {
                echo "<table align='center' border='1px'><tr>
<th>Section ID</th>
<th>Course ID</th>
<th>Course Name</th>
<th>Room ID</th>
<th>Room Number</th>
<th>Days</th>
<th>Time</th>
<th></th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
<td>".$row["SectionId"]."</td>
<td>".$row["CourseID"]."</td>
<td>".$row["CourseName"]."</td>
<td>".$row["RoomID"]."</td>
<td>".$row["RoomNo"]."</td>
<td>".$row["Days"]."</td>
<td>".$row["Time"]."</td>
<td>
<form action='functions/removeSection.php' method='POST'>
<input type='hidden' name='SectionID' value='".$row["SectionId"]."'>
<button type='submit' name='submit' value='Remove'>Remove section</button>
</form>
</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>

    <br /><br />
    <div align="center">
        <form action='Admin.php'><input type='submit' value='Back'></form>
    </div>
</section>
</body>
</html>