<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
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
</head>

<body>
<h1 align="center">Remove Course!</h1>

<form action="functions/removeCourse.php" method="POST">
    <table align="center" cellpadding = "20">
        <!----- Course Name-------------->
        <tr>
            <td>Select Course to remove</td>
            <td>
                <select name="CourseID" id="Course">
                    <?php

                    include_once 'functions/dbh.inc.php';

                    $sql = "SELECT * FROM course";
                    $result = $conn -> query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["CourseID"]."'>".$row["CourseName"]."</option>";
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td>
                <button type="submit" name="submit" value="Submit">Submit</button>
            </td>
        </tr>

        <tr>
            <td>
                <a href="Admin.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>






