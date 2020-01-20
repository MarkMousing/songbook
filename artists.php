<?php
  include 'assets/incl/header.php';

$dns = "mysql:host=localhost;dbname=songbook;charset=utf8";
$username = "root";
$password = "";
?>

    <main>
      <?php
      $db = new PDO($dns, $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT a.name, a.id AS artist_id
      FROM song_demo s
      JOIN artist a
      ON s.artist_id = a.id
      ORDER BY RAND()";

      try {
        $getArtists = $db->prepare($sql);
        $getArtists->execute();
        $row = $getArtists->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="heading"><h2>All Artists</h2></div>';
        echo '<ul>';
          foreach ($row as $rowData) {
            echo '<li>';

              echo '<a href="artist.php?artist_id='. $rowData["artist_id"] .'">'.$rowData["name"].'</a>';


            echo '</li>';
          }
        echo '</ul>';

      } catch (PDOException $error) {
        echo $error;
      }
      ?>
    </main>

    <script src="assets/js/nav.js"></script>
  </body>
</html>
