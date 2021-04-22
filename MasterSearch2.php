<?php

include_once 'includes/dbh.inc.php';

$sql = "select *
		from Section, Courses, Professor, Timeslot
		where Section.CourseID = Courses.CourseID
		and Section.Section_ProfessorID = Professor.ProfessorID
		and Section.TimeSlot = TimeslotID order by Timeslot";

$result = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($result);

if ($numrows > 0 )
{
	echo "<table class=\"table\">\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th>Course</th>\n";
	echo "<th>Section</th>\n";
	echo "<th>First Name</th>\n";
	echo "<th>Last Name</th>\n";
	echo "<th>Start Time</th>\n";
	echo "<th>End Time</th>\n";
	echo "<th>Meet Days</th>\n";
	echo "<th>Room Number</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";

	while($row = $result->fetch_assoc())
	{
		echo "<tbody>\n";
		echo "<tr>\n";
		echo "<td>".$row["courseName"]."</td>\n";
		echo "<td>".$row["sectionID"]."</td>\n";
		echo "<td>".$row["professorFirstName"]."</td>\n";
		echo "<td>".$row["professorLastName"]."</td>\n";
		echo "<td>".$row["startTime"]."</td>\n";
		echo "<td>".$row["endTime"]."</td>\n";
		echo "<td>".$row["meetDays"]."</td>\n";
		echo "<td>".$row["roomNum"]."</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
	}
	echo "</table>";

}
else
{
	echo "results pulled";
}
?>