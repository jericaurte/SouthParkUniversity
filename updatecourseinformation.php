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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style type="text/css">
        body{
            background: #B3B3B3;
            padding-center: 10px;
        }

        label{
            color: black;
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

<h1>Update Course Information</h1>
<br>
<form action="functions/updateCourse.php" id="reg"  method="POST">
    <div class="form-group">
        <table align="center">
            <tr>
                <td><label>Select Course</label></td>
                <td>
                    <div id="pickaclass">
                        <select id="course" name="CourseID">
                            <option>Select</option>

                            <?php
                            if ($result2->num_rows > 0) {
                                while($row = $result2->fetch_assoc()) {
                                    echo "<option value='".$row["CourseID"]."'>".$row["CourseName"]."</option>";
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td> <label>New department</label></td>
                <td>
                    <select id="department" name="DepartmentID">
                        <option>Select</option>

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
        </table>
    </div>

    <div class="form-group">
        <label>New course name:</label>
        <input type="text" name="coursename">
    </div>
    <div class="form-group">
        <label>New description:</label>
        <input type="text" name="coursedescription">
    </div>
    <div class="form-group">
        <label>New Credits:</label>
        <select id="credits" name="Credits">
            <option>Select</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>
    <div class="form-group">
        <label>New prerequisite:</label>
        <select id="prereq" name="PreReqCourse">
            <option>Select</option>

            <?php
            if ($result3->num_rows > 0) {
                while($row = $result3->fetch_assoc()) {
                    echo "<option value='".$row["CourseName"]."'>".$row["CourseName"]."</option>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </select>
    </div>
    <br>
    <br>
    <button type="Submit" name="submit">Update the Course</button>
    <br>
</form>

<div><form action="removePrereq.php"><input type="submit" value="Remove prerequisites"></form></div>

<form action="Admin.php"><input type="submit" value="Go Back to previous page"></form>
</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</html>