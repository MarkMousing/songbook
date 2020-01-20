<?php

include 'assets/incl/header.php';
include 'assets/incl/init.php';

?>

<?php

  echo '<form action="signup.inc.php" method="POST" class="signup">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="u_pwd" placeholder="Password">
        <button type="submit" name="submit">Signup</button>
        </form>
        <a href="login.php">Login</a>';

 ?>
