<?php
  include 'assets/incl/header.php';

  //$id = $_GET["id"];
  $search = $_GET["search"]
?>

    <main>
      <?php
      $db = new PDO($dns, $username, $password);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




      // $sql = "SELECT * FROM song_demo s WHERE s.title LIKE '%$search%'";

      // $sql = "SELECT s.id, s.title FROM song_demo s JOIN artist c ON s.artist_id = c.id WHERE title LIKE '%$search%'
      //         UNION
      //         SELECT a.name, a.id FROM artist a WHERE name LIKE '%$search%'";

      $sql = "SELECT s.id, s.title, s.artist_id, a.name FROM song_demo s JOIN artist a ON s.artist_id = a.id WHERE title LIKE '%$search%' OR name LIKE '%$search%'";
      // $sql = "SELECT s.id, s.title, s.artist_id, a.name, a.id FROM song_demo s, artist a WHERE title LIKE '%$search%'";


      try {
        $getSearch = $db->prepare($sql);
        $getSearch->execute();



        $row = $getSearch->fetchAll(PDO::FETCH_ASSOC);


        echo '<div class="heading"><h2>Search results: ' . $search . '</h2></div>';
        echo '<ul>';
          foreach ($row as $rowData) {
            echo '<li>';

              echo '<a href="details.php?id='. $rowData["id"]. '">'.$rowData["title"].'</a>';
              echo '<div class="right-content"><a href="artist.php?artist_id='. $rowData["artist_id"] .'">'. $rowData["name"] .'</a></div>';

            echo '</li>';
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
