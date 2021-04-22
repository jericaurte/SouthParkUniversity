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

$result4 = (object) ['num_rows' => '0'];
?>

<html>
<head>
    <style type="text/css">
        body{
            background: #808080;
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

    <script>
        function showPrereqs() {
            <?php
            if(isset($_POST['submit'])) {

                include_once 'functions/dbh.inc.php';

                $CourseID = $_POST['CourseID'];

                //Error Handlers
                //Check for Empty Fields
                if (empty($CourseID)) {
                    echo("<script LANGUAGE='JavaScript'>
   		    window.alert('Please select course');
    		window.location.href='http://southparkuniversity.com/removePrereq.php';
    		</script>");
                    exit();
                } else {
                    $sql4 = "SELECT * FROM course WHERE CourseID='$CourseID'";
                    $result4 = $conn->query($sql4);
                }
            }else {}
            ?>
        }
    </script>
</head>
<body>

<h1> Remove course prerequisites </h1>
<br>
<div align="center">
    <form onsubmit="showPrereqs()" method="POST">
        <select id="course" name="CourseID">
            <option>Select course</option>

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
        <input type="submit" name="submit" value="Show prerequisites">
    </form>

    <br /><br />

    <div align="center">
        <form action="functions/removePrerequisites.php" method="post">
            <?php
            if ($result4->num_rows > 0) {
                while($row = $result4->fetch_assoc()) {
                    echo "<input type='checkbox' name='prereq' value='".$row["CourseID"]."'>".$row["PreReqCourse"]."<br />";
                }
            } else {
                echo "0 results";
            }
            ?>
            <br /><br />
            <input type="submit" name="remove" value="Remove prerequisites">
        </form>
    </div>
</div>

<form action="updatecourseinformation.php"><input type="submit" value="Back"></form>
</body>
<script>'undefined'=== typeof _trfq || (window._trfq = []);'undefined'=== typeof _trfd && (window._trfd=[]),_trfd.push({'tccl.baseHost':'secureserver.net'}),_trfd.push({'ap':'cpsh'},{'server':'a2plcpnl0272'}) // Monitoring performance to make your website faster. If you want to opt-out, please contact web hosting support.</script><script src='https://img1.wsimg.com/tcc/tcc_l.combined.1.0.6.min.js'></script>
</html>