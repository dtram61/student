<?php

// Turn on error reporting
error_reporting(E_ALL);
ini_set("display_errors", TRUE);

//echo $_SERVER['DOCUMENT_ROOT'].'<br>';

//require_once '/home/dtramgre/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/../config.php';

// Step 1 Define the query
$sql = "INSERT INTO pets (name, type, color)
VALUES (:name, :type, :color)";

// 2. Prepare the statement, this helps precompile step 1.
$statement = $dbh->prepare($sql);

// 3. Bind the parameters
$name = 'Joey';
$type = 'kangaroo';
$color = 'white';
$statement->bindParam(':name', $name, PDO::PARAM_STR); // this is for passing data into parameters
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR); // this prevents sql injections
$statement->execute();
// 3.5 Bind another parameters again
$name = 'Slitherin';
$type = 'snake';
$color = 'green';
$statement->bindParam(':name', $name, PDO::PARAM_STR); // this is for passing data into parameters
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);
$statement->execute();
// alpaca
$name = 'Oscar';
$type = 'alpaca';
$color = 'pink';
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);
$statement->execute();
// sql injection is what you type into a database and get the code to execute(unwanted) , for example
// you can change $name into a sql drop table statement and get it to execute. This is why we bind the parameters

// delete query

$sql = "DELETE FROM pets WHERE id = :id";

//prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$id = 1;
$statement->bindParam(':id', $id, PDO::PARAM_INT);

//Execute
$statement->execute();
echo "<p>pet $id deleted</p>";


// Update the query by first define the query

$sql = "UPDATE pets SET name = :new WHERE name = :old";

//Prepare the statement

$statement = $dbh->prepare($sql);

// Bind the parameters

$old = 'Joey';
$new = 'Troy';
$statement->bindParam(':old', $old, PDO::PARAM_STR);
$statement->bindParam(':new', $new, PDO::PARAM_STR);


// 4. Execute the statement
$statement->execute();
//$id = $dbh->lastInsertId();
echo "<p>alpaca added!</p>";

// How to do a select query

$sql = "SELECT * FROM pets WHERE id = :id";

//prepare the statemenmt
$statement = $dbh->prepare($sql);

//Bind the parameters
$id = 3;
$statement->bindParam(':id', $id, PDO::PARAM_INT);

//execute the statement
$statement->execute();

//Process the result
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['name']. ", ".$row['type'].", ".$row['color'];


// How to select query multiple rows

$sql = "SELECT * FROM pets";

//prepare the statement
$statement = $dbh->prepare($sql);

// execute the statement
$statement->execute();

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row){
    echo "<p>".$row['name'].", ".$row['type'].", "
        .$row['color']."</p>";
}


