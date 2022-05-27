<?php

error_reporting(E_ALL);
ini_set("display_errors", TRUE);
// Turn on error reporting



//echo $_SERVER['DOCUMENT_ROOT'].'<br>';

//require_once '/home/dtramgre/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

// How to select query multiple rows

$sql = "SELECT * FROM student";

//prepare the statement
$statement = $dbh->prepare($sql);

// execute the statement
$statement->execute();

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
echo "<h1> Student List</h1>";
echo '<ol type="1">';

foreach ($result as $row) {
    echo "<li>" . $row['last'] . ", " . $row['first'] . "</li>";


}
echo '</ol>';
//make list items

// Add new student to the database
// Step 1 Define the query
$sql = "INSERT INTO student (sid, last, first, birthdate, gpa, advisor)
    VALUES (:sid, :last, :first, :birthdate, :gpa, :advisor)";

// 2. Prepare the statement, this helps precompile step 1.
$statement = $dbh->prepare($sql);

// 3. Bind the parameters







$sid = $_POST['sid'];
$statement->bindParam(':sid', $sid, PDO::PARAM_STR); // this is for passing data into parameters
$last = $_POST['last'];
$statement->bindParam(':last', $last, PDO::PARAM_STR);
$first = $_POST['first'];
$statement->bindParam(':first', $first, PDO::PARAM_STR); // this prevents sql injections
$birthdate = $_POST['birthdate'];
$statement->bindParam(':birthdate', $birthdate, PDO::PARAM_STR); // this prevents sql injections
$gpa = $_POST['gpa'];
$statement->bindParam(':gpa', $gpa, PDO::PARAM_STR); // this prevents sql injections
$advisor = $_POST['advisor'];
$statement->bindParam(':advisor', $advisor, PDO::PARAM_STR); // this prevents sql injections

$statement->execute();

//echo "<p>Gurnek added!</p>";

// conditional statement for server request
// checks if request method is post
// put in insert query statement
// list all the students in the table
// close off php quote
// add in form with hard html
// using post array to add a student to the database
//
?>

<h1>Add New Student</h1>

<form method="post" action="student.php">
    <label>SID</label><input type="text" name="sid"><br>
    <label>Last</label><input type="text" name="last"><br>
    <label>First</label><input type="text" name="first"><br>
    <label>Birthdate</label><input type="text" name="birthdate"><br>
    <label>GPA</label><input type="text" name="gpa"><br>
    <label>Advisor</label><input type="text" name="advisor"><br>

    <input type="submit" name="submit" value="Submit">
</form>








