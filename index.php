<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h3>Welcome to the Student Management System. Input your details here to register</h3>
	<form action="handleForms.php" method="POST">
		<p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
		<p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
		<p><label for="gender">Gender</label> <input type="text" name="gender"></p>
		<p><label for="yearLevel">Year Level</label> <input type="text" name="yearLevel"></p>
		<p><label for="section">Section</label> <input type="text" name="section"></p>
		<p><label for="adviser">Adviser</label> <input type="text" name="adviser"></p>
		<p><label for="religion">Religion</label> <input type="text" name="religion">
			<input type="submit" name="insertNewStudentBtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>Student ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Gender</th>
	    <th>Year Level</th>
	    <th>Section</th>
	    <th>Adviser</th>
	    <th>Religion</th>
	    <th>Action</th>
	  </tr>

	  <?php $seeAllStudentRecords = seeAllStudentRecords($pdo); ?>
	  <?php foreach ($seeAllStudentRecords as $row) { ?>
	  <tr>
	  	<td><?php echo $row['student_id']; ?></td>
	  	<td><?php echo $row['first_name']; ?></td>
	  	<td><?php echo $row['last_name']; ?></td>
	  	<td><?php echo $row['gender']; ?></td>
	  	<td><?php echo $row['year_level']; ?></td>
	  	<td><?php echo $row['section']; ?></td>
	  	<td><?php echo $row['adviser']; ?></td>
	  	<td><?php echo $row['religion']; ?></td>
	  	<td>
	  		<a href="editstudent.php?student_id=<?php echo $row['student_id'];?>">Edit</a>
	  		<a href="deletestudent.php?student_id=<?php echo $row['student_id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>



</body>
</html>
