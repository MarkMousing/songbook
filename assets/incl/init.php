<?php
$dns = "mysql:host=localhost;dbname=songbook;charset=utf8";
$username = "root";
$password = "";


try {
    $db = new PDO($dns, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "ERROR!:" . $e->getMessage() . "<br />";
}
 ?>
