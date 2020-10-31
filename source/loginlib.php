<?php

$dbh = new PDO("mysql:dbhost=localhost;dbname=newspaper3", "root", "");
class login
{
  private $id;
  private $name;
  private $pass;
  public function __construct($username, $pass, $id="")
  {
    $this->username = $username;
    $this->pass = $pass;
    $this->id   = $id;
  }
  public function adduser()
  {
    global $dbh;
    $mysql = $dbh->prepare("INSERT INTO login(username, pass) VALUES ('$this->username','$this->pass')");
    if($mysql->execute()){
      return true;
    }else{
      return false;
    }
  }
  public function callinformatin()
  {
    global $dbh;
    $sql = $dbh->prepare("SELECT * FROM login");
    $sql->execute();
    $allusers = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $allusers;
  }

}
?>
