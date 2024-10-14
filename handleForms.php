<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['insertNewStudentBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $gender = trim($_POST['gender']);
    $yearLevel = trim($_POST['yearLevel']);
    $section = trim($_POST['section']);
    $adviser = trim($_POST['adviser']);
    $religion = trim($_POST['religion']);

    if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($yearLevel) && !empty($section) && !empty($adviser) && !empty($religion)) {
        $query = insertIntoStudentRecords($pdo, $firstName, $lastName, $gender, $yearLevel, $section, $adviser, $religion);

        if ($query) {
            header("Location: index.php");
            exit(); // Ensure no further code is executed
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editStudentBtn'])) {
    // Check if student_id is set in POST request
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];  // Get student_id from POST
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $gender = trim($_POST['gender']);
        $yearLevel = trim($_POST['yearLevel']);
        $section = trim($_POST['section']);
        $adviser = trim($_POST['adviser']);
        $religion = trim($_POST['religion']);

        if (!empty($student_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($yearLevel) && !empty($section) && !empty($adviser) && !empty($religion)) {
            $query = updateAStudent($pdo, $student_id, $firstName, $lastName, $gender, $yearLevel, $section, $adviser, $religion);

            if ($query) {
                header("Location: index.php");
                exit();
            } else {
                echo "Update failed";
            }
        } else {
            echo "Make sure that no fields are empty";
        }
    } else {
        echo "No student ID provided for editing.";
    }
}

if (isset($_POST['deleteStudentBtn'])) {
    // Check if student_id is set in POST request
    if (isset($_POST['student_id'])) {
        $student_id = $_POST['student_id'];  // Get student_id from POST
        if (!empty($student_id)) {
            $query = deleteAStudent($pdo, $student_id);
            if ($query) {
                header("Location: index.php");
                exit();
            } else {
                echo "Deletion failed";
            }
        } else {
            echo "Invalid student ID for deletion";
        }
    } else {
        echo "No student ID provided for deletion.";
    }
}

?>
