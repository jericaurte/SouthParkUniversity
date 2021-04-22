<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php

include_once 'functions/readDepartments.php';

?>

<html>
<head>
    <style>
        body
        {
            background-color: #B3B3B3;
        }

    </style>
</head>

<body>
<h1 align="center">Add Course</h1>
<form action="functions/addCourse.php" method="POST">
    <table align="center">
        <tr>
            <td>
                <table align="center" cellpadding = "20">
                    <!----- Course Name-------------->
                    <tr>
                        <td>COURSE NAME</td>
                        <td><input type="text" name="CourseName" maxlength="50" placeholder="Enter course name" />
                        </td>
                    </tr>
                    <!----- Department Name-------------->
                    <tr>
                        <td>Department Name</td>
                        <td>
                            <select name="DepartmentName" id="Department Name ">
                                <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row["DepartmentID"]."'>".$row["DeptName"]."</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Major</td>
                        <td>
                            <select name="Major" id="Major Name ">
                                <?php

                                include_once 'functions/dbh.inc.php';

                                $sql5 = "SELECT * FROM major";
                                $result5 = $conn->query($sql5);

                                if ($result5->num_rows > 0) {
                                    while($row = $result5->fetch_assoc()) {
                                        echo "<option value='".$row["MajorShort"]."'>".$row["MajorName"]."</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <!----- Course Description-------------->
                    <tr>
                        <td>Course Description</td>
                        <td><textarea name="CourseDescription" col="30" rows="10"></textarea></td>
                    </tr>
                    <!----- Credits-------------->
                    <tr>
                        <td>Credits:</td>
                        <td>
                            <select name="Credit" id="Credit">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Add prerequisite:</td>
                        <td>
                            <select id="prereq" name="PreReqCourse">
                                <option>Select</option>

                                <?php

                                include_once 'functions/dbh.inc.php';

                                $sql2 = "SELECT * FROM course ORDER BY CourseName";
                                $result2 = $conn->query($sql2);

                                if ($result2->num_rows > 0) {
                                    while($row = $result2->fetch_assoc()) {
                                        echo "<option value='".$row["CourseName"]."'>".$row["CourseName"]."</option>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
            <!--<td>
                <table>
                    <thead><th style="font-size: 20px">Add Prerequisite(s)</th></thead>
                    <tbody>
                    <tr>
                        <td>
                            <?php
/*
                            include_once 'functions/dbh.inc.php';

                            $sql2 = "SELECT * FROM course ORDER BY CourseName";
                            $result2 = $conn->query($sql2);

                            if ($result2->num_rows > 0) {
                                // output data of each row
                                while($row = $result2->fetch_assoc()) {
                                    echo "<input type='checkbox' name='PreReq[]' value='".$row["CourseName"]."'>".$row["CourseName"]."";
                                }
                            } else {
                                echo "No courses";
                            }
                            */?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>-->
        </tr>
    </table>

    <div align="center">
        <br/><br/>

        <button type="submit" name="submit" value="Submit">Add Course</button>

        <br/><br/><br/><br/>

        <a href="Admin.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a>
    </div>

</form>
</body>
</html>






