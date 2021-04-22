<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
$result = (object) ['num_rows' => '0'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Hold</title>

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
                    $sql = "SELECT * FROM studenthold WHERE StudentEmail='$StudentEmail';";
                    $result = $conn->query($sql);
                }
            }
            else {}
            ?>
        }
    </script>
</head>
<body>
<h1>Remove Hold</h1>

<form onsubmit="filterArray()" method="post">
    <input type="email" style="width: 300px; height: 30px" name="searchItem" value="" placeholder="Enter student email">
    <input type="submit" name="submit" value="Search Student Hold">
</form>

<br /><br />

<form action="functions/removeHold.php" method="POST">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<input type='radio' name='studentHold' value='".$row["HoldID"]."'>".$row["StudentEmail"]."  -  ".$row["HoldType"]."<br />";
        }
    } else {
        echo "0 results";
    }
    ?>
    <br/>
    <br/>
    <center><button type = "submit" name = "submit">Remove Hold</button></center>
</form>
<br>
<form action="Admin.php"><input type="submit" value="Back"></form>
</body>
</html>