<?php
if (isset($_COOKIE['Email'])) {}else{
    echo ("<script LANGUAGE='JavaScript'>
    		window.location.href='http://www.southparkuniversity.com/loggingin.php';
    		</script>");
    exit();
}
?>

<?php
include_once 'functions/readHoldStudent.php';

$result = (object) ['num_rows' => '0'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <style>
        body{
            background-color: #B3B3B3;
            text-align: center;
        }

        label{
            color: white;
        }

        form {
            width: 200px;
            margin: auto;
            text-align: center;
        }

        h1{
            text-align: center;
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
    		window.location.href='http://southparkuniversity.com/AddHold.php';
    		</script>");
                    exit();
                }
                else
                {
                    //Insert Into Course Table
                    $sql = "SELECT * FROM student WHERE EmailAddress='$StudentEmail';";
                    $result = $conn->query($sql);
                }
            }
            else {}
            ?>
        }
    </script>
</head>
<body>
<h1>ADD HOLD</h1>

<form onsubmit="filterArray()" method="post">
    <input type="email" style="width: 300px; height: 30px" name="searchItem" value="" placeholder="Enter student email"> <br /><br />
    <input type="submit" name="submit" value="Search Student">
</form>
<br /><br />
<form action="functions/addHold.php" method="POST">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<input type='radio' name='StudentEmail' value='".$row["EmailAddress"]."'>".$row["FirstName"]." ".$row["LastName"]."<br />";
        }
    } else {
        echo "0 results";
    }
    ?>

    <br>
    <br>

    <p>Select hold type:</p>
    <?php
    include_once 'functions/dbh.inc.php';

    $sql5 = "SELECT * FROM hold";
    $result5 = $conn->query($sql5);

    if ($result5->num_rows > 0) {
        while($row = $result5->fetch_assoc()) {
            echo "<input type='checkbox' name='hold[]' value='".$row["HoldType"]."'>".$row["HoldType"]."<br />";
        }
    } else {
        echo "0 results";
    }
    ?>

    <br>
    <br>

    <center><button id="holdSubmit" type = "submit" name = "add">Add Hold</button></center>
</form>

<br>

<form action="Admin.php"><input type="submit" value="Back"></form>

</body>
</html>




