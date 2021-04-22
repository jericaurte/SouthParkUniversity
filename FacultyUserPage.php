<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
</head>

<body bgcolor="#B3B3B3">
<h1 align="center">Enter Faculty Information</h1>
<form action="functions/createFacultyUser.php" method="POST">
    <table align="center" cellpadding = "20">
        <!----- First Name-------------->
        <tr>
            <td>First Name</td>
            <td><input type="text" name="FirstName" maxlength="50" /></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="LastName" maxlength="50" /></td>
        </tr>
        <tr>
            <td>Email Address</td>
            <td><input type="email" name="EmailAddress" maxlength="50" /></td>
        </tr>
        <tr>
            <td>Enter Temporary Password</td>
            <td><input type="password" name="Password" maxlength="50" /></td>
        </tr>
        <tr>
            <td>Assign Department</td>
            <td>
                <select name="Department" id="Department ">
                    <?php
                    include_once 'functions/dbh.inc.php';

                    $sql = "SELECT * FROM department";
                    $result = $conn->query($sql);

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
            <td>Status:</td>
            <td>
                <select name="Status" id="Status">
                    <option>Select</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit" value="Create">Submit</button>
            </td>
        </tr>
        <tr>
            <td>
                <a href= "CreateUser.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>