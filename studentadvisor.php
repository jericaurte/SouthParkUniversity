<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readMyAdvisors.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Advisor</title>

    <style type="text/css">
        body{
            background: #B3B3B3;
            padding-left: 10px;
        }

        label{
            color: white;
        }

        input[type=submit]{
            width: 200px;
            height: 50px;
        }

        button{
            width: 200px;
            height: 50px;
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
<h1 align="center">View Advisor</h1>
<div style="text-align: center" align="center">
    <?php
    if ($result->num_rows > 0) {
        echo "<table align='center'><tr><th>My advisor</th><th>Email</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["ProfFirstName"]." ".$row["ProfLastName"]."</td><td>".$row["ProfEmail"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No advisor yet";
    }
    ?>
</div>
<br><br /><br />
<form action="Student.php"><input type="submit" value="Back"></form>
</body>