<?php
  include 'assets/incl/init.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>song book</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/master.css" />
  </head>
  <body>
    <nav class="topnav">
      <h1><a href="index.php">SONGBOOK</a></h1>
      <form method="GET" action="search.php">
        <input type="text" placeholder="Search..." name="search" />
      </form>

      <div class="right-nav">
        <a href="login.php"><i class="fas fa-user"></i></a>
        <div class="burger">
          <i class="fas fa-bars"></i>
        </div>
      </div>

      <div class="burger-close close-closed"></div>

      <ul class="burger-list list-closed">
        <div class="close-icon"><i class="fas fa-times"></i></div>
        <li><a href="index.php">All songs</a></li>
        <li><a href="artists.php">All artists</a></li>
        <!-- <li><a href="#">All album</a></li> -->
        <!-- <li><a href="#">All genres</a></li> -->
      </ul>
    </nav>
