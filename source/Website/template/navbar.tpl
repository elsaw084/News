<?php
require_once '../lib.php';
?>
<!---Start Navigation----->
<nav id="navbar">
  <ul>
    <li><a href="index.php">Home</a></li>
    <?php
      $allNavbar = Navbar::retreiveAllNavbars();
      if(is_array($allNavbar) && count ($allNavbar)>0){
        foreach($allNavbar as $Navbar){
          echo '<li><a href="'.$Navbar['link'].'">'.$Navbar['name'].'</a></li>';
        }
      }
    ?>
  </ul>
</nav>
<!--End Navigation----->
