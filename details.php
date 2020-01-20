<?php
 include 'assets/incl/header.php';

 $id = $_GET["id"];

 //$dns = "mysql:host=localhost;dbname=songbook;charset=utf8";
 //$username = "root";
 //$password = "";
 //$id = $_GET["id"];
?>

    <main>
      <?php
      $db = new PDO($dns, $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


      $sql = "SELECT s.title, s.content, a.name, a.id AS artist_id FROM song_demo s JOIN artist a ON s.artist_id = a.id WHERE s.id = :id";

      try {
      $getSong = $db->prepare($sql);
      $getSong->bindParam(':id', $id);
      $getSong->execute();
      $row = $getSong->fetchAll(PDO::FETCH_ASSOC);

      foreach ($row as $rowData) {
        echo '<header class="detail-header">';
        echo '<h1>'. $rowData["title"] .'<h1>';
        echo '<h2><a href="artist.php?artist_id='. $rowData["artist_id"] . '">' . $rowData["name"] . '</a></h2>';
        echo '</header>';
        echo '<pre>'. $rowData["content"] . '</pre>';
      }

      } catch (PDOException $error) {
      echo $error;
      }
      ?>
    </main>

<?php
  include 'assets/incl/footer.php';
 ?>
