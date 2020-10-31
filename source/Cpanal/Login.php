<?php
require_once("../loginlib.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="template/css/log.css" />
    <link rel="stylesheet" type="text/css" href="template/css/fonts-min.css"/>
  </head>
  <body>
    <div id="all">
      <div id="cyic">
        <h1>A</h1>
      </div>
      <div id="log">
        <?php
          if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username == null){
              echo "input username here!";
            }elseif(is_numeric($username)){
              echo "Should be Letter";
            }elseif($password == null){
              echo "input password here!";
            }else{
              ////////////////
              $users = login::callinformatin();
                foreach ($users as $user){
                  if($user['username'] == $username && $user['pass'] == $password){
                    // session start
                    session_start();
                    // create session
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['username'] = userDB;
                    // redirect to about us page
                    header("Location: index.php");
                    // for security
                    exit();
                  }elseif ($user['username'] !== $username) {
                    echo "Error";
                  }
                }
            }
          }
        ?>
        <?php
          if(isset($_POST['signup'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($username == null){
              echo "input username here!";
            }elseif(is_numeric($username)){
              echo "Should be Letter";
            }elseif($password == null){
              echo "input password here!";
            }else{
              ////////////////
              $addusers = new login($username, $password);
              if($addusers->adduser()){
                echo "success";
              }else{
                echo "Fail";
              }
            }
          }
        ?>
        <form action="Login.php" method="POST">
            <label>username</label>
            <input type="text" name="username" />
            <label>password</label>
            <input type="password" name="password" />
            <input type="submit" name="login" value="login" />
            <input type="submit" name="signup" value="Sign Up" />
        </form>
    </div>
  </div>
  </body>
</html>
