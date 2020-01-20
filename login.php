<?php
  session_start();

  include 'assets/incl/header.php';
  include 'assets/incl/init.php';

  ?>

  <?php

  if (isset($_SESSION['u_id'])) {
           echo '<form action="logout.inc.php" method="POST" class="login">
           <button type="submit" name="submit">Logout</button>
           </form>';
        } else {
            echo '<form action="login.inc.php" method="POST" class="login">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="u_pwd" placeholder="Password">
        <button type="submit" name="submit">Login</button>
        </form>
        <a href="signup.php">Sign up</a>';
        }

   ?>

<?php
  include 'assets/incl/footer.php';
 ?>
