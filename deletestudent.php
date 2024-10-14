<?php require_once 'dbConfig.php'; ?>
<?php require_once 'models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirm Deletion</title>
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
	<h1>Are you sure you want to delete this user?</h1>
	<?php 
	// Check if student_id is provided
	if (!isset($_GET['student_id'])) {
		echo "No student ID provided.";
		exit;
	}

	// Retrieve the student record for confirmation
	$getStudentById = getStudentById($pdo, $_GET['student_id']);
	if (!$getStudentById) {
		echo "No student found with this ID.";
		exit;
	}
	?>
	<form action="handleForms.php" method="POST">
		<!-- Hidden field to store student_id -->
		<input type="hidden" name="student_id" value="<?php echo htmlspecialchars($getStudentById['student_id']); ?>">
		<div class="studentContainer" style="border-style: solid; font-family: 'Arial';">
			<p>First Name: <?php echo htmlspecialchars($getStudentById['first_name']); ?></p>
			<p>Last Name: <?php echo htmlspecialchars($getStudentById['last_name']); ?></p>
			<p>Gender: <?php echo htmlspecialchars($getStudentById['gender']); ?></p>
			<p>Year Level: <?php echo htmlspecialchars($getStudentById['year_level']); ?></p>
			<p>Section: <?php echo htmlspecialchars($getStudentById['section']); ?></p>
			<p>Adviser: <?php echo htmlspecialchars($getStudentById['adviser']); ?></p>
			<p>Religion: <?php echo htmlspecialchars($getStudentById['religion']); ?></p>
			<input type="submit" name="deleteStudentBtn" value="Delete">
		</div>
	</form>
</body>
</html>
