<?php
  include 'assets/incl/header.php';

//  $id = $_GET["id"];
?>

    <main>
      <?php
      $db = new PDO($dns, $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT s.id, s.title, a.name FROM song_demo s JOIN artist a ON s.artist_id = a.id WHERE a.id = :artist_id";

      try {
        $getArtist = $db->prepare($sql);
        $getArtist->bindParam(':artist_id', $artist_id);
        $getArtist->Execute();
        $row = $getArtist->fetchAll(PDO::FETCH_ASSOC);


          echo '<header class="detail-header">';
          foreach ($row as $rowData) {
            echo '<h1>'. $rowData["name"] . '</h1>';
            break;
          }
          echo '</header>';

          echo '<ul>';
        foreach ($row as $rowData) {
          echo '<li><a href="details.php?id=' . $rowData['id'] . '">' .$rowData["title"] . '</a></li>';
        }
        echo '</ul>';


      } catch (PDOException $error) {
        echo $error;
      }
      ?>
    </main>

<?php
  include 'assets/incl/footer.php';
 ?>
