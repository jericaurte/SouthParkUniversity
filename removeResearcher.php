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
            background-color: #B3B3B3;
        }
    </style>
</head>

<body>
<h1 align="center">Remove Researcher!</h1>

<form action="functions/removeResearcher.php" method="POST">
    <table align="center" cellpadding = "20">
        <tr>
            <td>Enter Researcher email</td>
            <td><input type="email" name="email"></td>
        </tr>

        <tr>
            <td>
                <button type="submit" name="submit" value="Submit">Submit</button>
            </td>
        </tr>

        <tr>
            <td>
                <a href="RemoveUser.php"><button type="submit" form="nameform" value="Previous Page"> Go Back to Previous Page </button></a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>