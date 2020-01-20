<?php

  include 'assets/incl/header.php';

?>

    <main>
      <h1>Add new song</h1>
      <form method="POST" class="makeNew">
        <label>Song title</label>
        <input type="text" name="songTitle" />

        <label>Artist</label>
        <input type="text" name="songArtist" id="songArtist" onkeyup="myFunction()" autocomplete="off" />
          <?php
            $db = new PDO($dns, $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
              $sql = "SELECT name FROM artist";

              $getArtist = $db->prepare($sql);
              $getArtist->execute();
              $row = $getArtist->fetchAll(PDO::FETCH_ASSOC);

              echo '<ul class="artistList">';
              foreach ($row as $rowData) {
                echo '<li>';
                  echo '<a>' . $rowData["name"] . '</a>';
                echo '</li>';

              }
              echo '</ul>';
            } catch (PDOException $error) {
              echo $error;
            }
          ?>

        <label>Song Text</label>
        <textarea name="songText"></textarea>

        <button type="submit" name="submit">Upload song</button>
        <div class="clearfix"></div>
      </form>

      <?php



      // try {
      //   $songTitle = $_GET['songTitle'];
      //   $songArtist = $_GET['songArtist'];
      //   $songText = $_GET['songText'];
      //   echo $insert = "INSERT INTO song_demo (`title`, `content`)
      //   VALUES('".$songTitle."', '".$songText."')";
      //
      //
      //   $db->query($insert);
      // } catch(PDOException $error) {
      //   echo $error;
      // }
      //
      // $db = null;
      ?>


    </main>

    <script>

    function myFunction() {
      var input, filter, ul, li, a, i, txtValue;
      input = document.getElementById("songArtist");
      filter = input.value.toUpperCase();
      ul = document.querySelector(".artistList");
      li = ul.querySelectorAll(".artistList li");

        if (input.value != 0) {
          ul.style.display = "block";
        } else {
          ul.style.display = "none";
        }
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
      }


      $(".artistList li").click(function() {
        var liVal = $(this).children('a').html();
        $('#songArtist').val(liVal);
        $('.artistList').hide();
      });

    </script>

<?php
  include 'assets/incl/footer.php';
 ?>
