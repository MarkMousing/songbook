  <?php
    include 'assets/incl/header.php';
    echo "he hej";
  ?>

    <main>
      <div class="addnew">
        <a href="addnew.php">Add new song</a>
      </div>
      <?php
        try {
          $db = new PDO($dns, $username, $password);
          $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $allSongsTitle = $db->query("
          SELECT s.id, s.title, a.name, a.id AS artist_id
          FROM song_demo s
          JOIN artist a
          ON s.artist_id = a.id
          ORDER BY RAND()
          ");


          $row = $allSongsTitle->fetchAll(PDO::FETCH_ASSOC);
          echo '<div class="heading"><h2>All Songs</h2><p>Artist</p></div>';
          echo '<ul>';
            foreach ($row as $rowData) {
              echo '<li>';

                echo '<a href="details.php?id='. $rowData["id"]. '">'.$rowData["title"].'</a>';
                echo '<div class="right-content"><a href="artist.php?artist_id='. $rowData["artist_id"] .'">'. $rowData["name"] .'</a></div>';

              echo '</li>';
            }
          echo '</ul>';

        } catch (PDOException $error) {
          echo "Jo det virker sgu ikke med det database der:" . $error;
        }

        $db = null;
      ?>
    </main>

<?php
  include 'assets/incl/footer.php';
 ?>
