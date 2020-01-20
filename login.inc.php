<?php
  session_start();

  if (isset($_POST['submit'])) {
    include 'assets/incl/init.php';

    $username = $_POST['username'];
    $pwd = $_POST['u_pwd'];
    //Tjek for fejl:

      //Tjek om felterne er tomme:
      if (empty($username) || empty($pwd)) {
             header("Location: login.php?login=empty");
             exit();
         } else {
             $sql = "SELECT * FROM user WHERE username = :username";
             $result = $db->prepare($sql);
             $result->bindParam(':username', $username);
             $result->execute();
             $resultCheck = $result->fetchColumn();

             if ($resultCheck < 1) {
                 header("Location: login.php?login=error");
                 exit();
             } else {
                 if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    //De-hashing password!:
                     $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);

                     if ($hashedPwdCheck == false) {
                         header("Location: login.php?login=error");
                         exit();
                     } elseif ($hashedPwdCheck == true) {
                        //Giv Brugeren adgang til til siden!:
                         $_SESSION['username'] = $row['username'];
                         $_SESSION['u_pwd'] = $row['user_pwd'];
                         header("Location: index.php");
                         exit();
                     }
                 }
             }
         }
    } else {
    header("Location: login.php?login=error");
    exit();
}

?>
