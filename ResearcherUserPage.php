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
<h1 align="center">Enter Researcher Information</h1>
<form action="functions/createResearcherUser.php" method="POST">
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