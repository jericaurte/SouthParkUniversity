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
    <title>Update Student Data</title>

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
                    $sql = "SELECT a.*, b.*, c.* FROM student as a INNER JOIN professor as b ON (a.AdvisorID = b.ProfessorID) INNER JOIN major as c ON (a.Major = c.MajorID) WHERE EmailAddress='$StudentEmail'";
                    $result = $conn->query($sql);
                }
            }
            else {}
            ?>
        }
    </script>
</head>
<body>
<h1>Update Student Data</h1>

<form onsubmit="filterArray()" method="post">
    <input type="email" style="width: 300px; height: 30px" name="searchItem" value="" placeholder="Enter student email">
    <input type="submit" name="submit" value="Search Student">
</form>

<br /><br />

<form action="functions/updateStudentData.php" method="POST">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<table align='center'>
                <tr>
                <td style='text-align: left'>Student Name</td>
                <td style='text-align: right'>".$row['FirstName']." ".$row['LastName']."</td>
                </tr>
                <tr>
                <td style='text-align: left'>Advisor</td>
                <td style='text-align: right'>".$row['ProfFirstName']." ".$row['ProfLastName']."</td>
                </tr>
                
                <tr>
                <td style='text-align: left'>Email</td>
                <td style='text-align: right'>".$row['EmailAddress']."</td>
                </tr>
                <tr>
                <td style='text-align: left'>Status</td>
                <td style='text-align: right'>".$row['Status']."</td>
                <td>
                <select name='Status'>
                                <option value='Full Time'>Full Time</option>
                                <option value='Part Time'>Part Time</option>
                            </select>
                      </td>
                </tr>
                <tr>
                <td style='text-align: left'>Major</td>
                <td style='text-align: right'>".$row['MajorName']."</td>
                </tr>
                <tr>
                <td style='text-align: left'>Credits </td>
                <td style='text-align: right'>".$row['CreditsEarned']."</td>
                <td><input type='number' name='Credits' placeholder='Edit Credits'></td>
                </tr>
                <tr>
                <td style='text-align: left'>GPA</td>
                <td style='text-align: right'>".$row['GPA']."</td>
                <td><input type='number' name='GPA' placeholder='Edit GPA'></td>
                </tr>
                <tr>
                <td style='text-align: left'>Birthday</td>
                <td style='text-align: right'>".$row['Birthday']."</td>
                </tr>
                <tr>
                <td style='text-align: left'>Start Year</td>
                <td style='text-align: right'>".$row['StartYear']."</td>
                </tr>
                <tr>
                <td style='text-align: left'>End Year</td>
                <td style='text-align: right'>".$row['EndYear']."</td>
                </tr>
                <tr>
                <td style='text-align: left'>Graduated</td>
                <td style='text-align: right'>".$row['Graduated']."</td>
                <td>
                <select name='Graduated'>
                                <option value='Yes'>Yes</option>
                                <option value='No'>No</option>
                            </select>
                </td>
                </tr>
                <tr>
                <td style='text-align: left'>Year of Graduation</td>
                <td style='text-align: right'>".$row['YearOfGraduation']."</td>
                <td><input type='number' name='YearOfGraduation' placeholder='Edit Year of Graduation'></td>
                </tr>
            </table>";

            echo "<input type='hidden' name='StudentID' value='".$row["StudentID"]."'>";
        }
    } else {
        echo "0 results";
    }
    ?>
    <br/>
    <br/>
    <center><button type = "submit" name = "submit">Update Student Data</button></center>
</form>
<br>
<form action="Admin.php"><input type="submit" value="Back"></form>
</body>