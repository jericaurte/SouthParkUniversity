<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readHolds.php';

$result1 = (object) ['num_rows' => '0'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Holds</title>

    <style type="text/css">
        body{
            background: #B3B3B3;
            padding-left: 10px;
        }

        label{
            color: white;
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

    <script>
        function filterArray() {
            <?php
            if (isset($_POST['submit']))
            {
                include_once 'functions/dbh.inc.php';

                $StudentEmail = $_POST['searchItem'];

                //Error Handlers
                //Check for Empty Fields
                if (empty($StudentEmail)) {
                    echo ("<script LANGUAGE='JavaScript'>
   		    window.alert('Please fill in student email');
    		window.location.href='http://southparkuniversity.com/RemoveHold.php';
    		</script>");
                    exit();
                }
                else
                {
                    //Insert Into Course Table
                    $sql1 = "SELECT a.*, b.* FROM studenthold as a INNER JOIN student as b ON (a.StudentEmail=b.EmailAddress) WHERE a.StudentEmail='$StudentEmail'";
                    $result1 = $conn->query($sql1);
                }
            }
            else {}
            ?>
        }
    </script>

</head>
<body>
<h1>View Holds</h1>

<form onsubmit="filterArray()" method="post">
    <input type="email" style="width: 300px; height: 30px" name="searchItem" value="" placeholder="Enter student email">
    <input type="submit" name="submit" value="Search Student Hold">
</form>
<br /><br />
<div class="showHolds" align="">
    <?php
    if ($result1->num_rows > 0) {
        echo "<table align='center' border='1px'><tr><th>Student Name</th><th>Student Email</th><th>Hold Type</th></tr>";
        // output data of each row
        while($row = $result1->fetch_assoc()) {
            echo "<tr><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["StudentEmail"]."</td><td>".$row["HoldType"]."</td></tr>";
        }
        echo "</table>";
    } else {}
    ?>
</div>

<br /><br />
<form action="Admin.php"><input type="submit" value="Back"></form>
</body>
</html>