<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
require_once '../lib.php';
adminlog::session();
?>
<div id="content">
  <?php
      if(isset($_POST['addNavbar'])){
          // collect data
          $name = $_POST['name'];
          $link = $_POST['link'];
          // check data valid or no
          if($name == null){
              echo "please insert the value of name";
          }elseif($link == null){
              echo "please insert the value of link";
          }else{
              // operations
              $Navbar = new Navbar($name , $link);
              if($Navbar->addNavbar()){
                echo "success";
              }else{
                echo "Fail";
              }
          }
      }
  ?>
    <form action="addnavbar.php" method="POST">
        <label>Navbar name</label>
        <input type="text" name="name" />
        <label>Link name</label>
        <input type="text" name="link" />
        <input type="submit" name="addNavbar" value="add Navbar"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>
