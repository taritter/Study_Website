
<?php
$databaseName = 'TARITTER_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'taritter_writer';
$password = 'eLr7Z9SIPAf3';

$pdo = new PDO($dsn, $username, $password);
?>