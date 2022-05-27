<?php

// 328/pdo/config.php


// Define constants
define("DB_DSN", "mysql:dbname=dtramgre_grc");
define("DB_USERNAME", "dtramgre_sdev328");
define("DB_PASSWORD", "Qazwsxedc123328");

try {
    // Connect to database
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo " Still Connected!";
}
catch (PDOException $e) {
    echo $e->getMessage();
}

