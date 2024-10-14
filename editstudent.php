<?php 
require_once 'dbConfig.php'; 
require_once 'models.php'; 

// Check if student_id is provided
if (!isset($_GET['student_id'])) {
    echo "No student ID provided.";
    exit;
}

// Retrieve the student record
$getStudentById = getStudentById($pdo, $_GET['student_id']);
if (!$getStudentById) {
    echo "No student found with this ID.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Student</title>
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
	<form action="handleForms.php" method="POST">
		<!-- Hidden field to store student_id -->
		<input type="hidden" name="student_id" value="<?php echo $getStudentById['student_id']; ?>">
		
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getStudentById['first_name']; ?>" required>
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getStudentById['last_name']; ?>" required>
		</p>
		<p>
			<label for="gender">Gender</label>
			<input type="text" name="gender" value="<?php echo $getStudentById['gender']; ?>" required>
		</p>
		<p>
			<label for="yearLevel">Year Level</label>
			<input type="text" name="yearLevel" value="<?php echo $getStudentById['year_level']; ?>" required>
		</p>
		<p>
			<label for="section">Section</label>
			<input type="text" name="section" value="<?php echo $getStudentById['section']; ?>" required>
		</p>
		<p>
			<label for="adviser">Adviser</label>
			<input type="text" name="adviser" value="<?php echo $getStudentById['adviser']; ?>" required>
		</p>
		<p>
			<label for="religion">Religion</label>
			<input type="text" name="religion" value="<?php echo $getStudentById['religion']; ?>" required>
		</p>
		<p>
			<input type="submit" name="editStudentBtn" value="Update Student">
		</p>
	</form>
</body>
</html>
