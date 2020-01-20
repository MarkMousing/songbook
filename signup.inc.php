<?php
session_start();

if(isset($_POST['submit'])){

  include 'assets/incl/init.php';
  $username = $_POST['username'];
  $pwd = $_POST['u_pwd'];

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pwd = !empty($_POST['u_pwd']) ? trim($_POST['u_pwd']) : null;

    $sql = "SELECT COUNT(username) AS num FROM user WHERE username = :username";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        die('That username already exists!');
    }

    $passwordHash = password_hash($pwd, PASSWORD_BCRYPT, array("cost" => 12));

    $sql = "INSERT INTO user (username, user_pwd) VALUES (:username, :user_pwd)";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':user_pwd', $passwordHash);

    $result = $stmt->execute();

    if($result){
        header("Location: index.php");
    }

}
 ?>
