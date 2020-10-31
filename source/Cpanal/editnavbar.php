<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
require_once '../lib.php';
adminlog::session();
?>
<div id="content">
  <?php
      // delete and edit category
      if(isset($_GET['action'], $_GET['id'])){
          // collect data
          $action = $_GET['action']; // may be delete or edit
          $id = $_GET['id'];
          switch($action){
              case 'delete':
                  Navbar::deleteNavbar($id);
                  break;
              case 'edit':
                  $Navbar = Navbar::retreiveNavbar($id);
                  if(is_array($Navbar)){
                      echo '<form action="editnavbar.php" method="POST">
                          <label>Navbar name</label>
                          <input type="text" name="name" value="'.$Navbar['name'].'"/>
                          <label>Link name</label>
                          <input type="text" name="link" value="'.$Navbar['link'].'" />
                          ';
                              echo '
                              <input type="hidden" name="id" value="'.$Navbar['id'].'"/>
                          <input type="submit" name="updateNavbar" value="update Navbar"/>
                      </form>';
                  }else{
                      echo "no Navbar found";
                  }
                  break;
              default:
                  echo 'invalid action';
          }
      }

      // update category
      if(isset($_POST['updateNavbar'])){
          // collect data
          $name = $_POST['name'];
          $id = $_POST['id'];
          $link = $_POST['link'];
          // check data valid or no
          if($name == null){
              echo "please insert the value of name";
          }elseif($link == null){
              echo "please insert the value of link";
          }else{
              // operations
              $Navbar = new Navbar($name, $link, $id);
              echo $Navbar->updateNavbar();
          }
      }
  ?>
  <table>
      <tr>
          <th>id</th>
          <th>Navbar name</th>
          <th>Navbar link</th>
          <th>delete</th>
          <th>edit</th>
      </tr>
      <?php
      $allNavbars = Navbar::retreiveAllNavbars();
      if(is_array($allNavbars) && count($allNavbars) >0) {
          foreach ($allNavbars as $Navbar){
              echo '<tr>
                      <td>'.$Navbar['id'].'</td>
                      <td>'.$Navbar['name'].'</td>
                      <td>'.$Navbar['link'].'</td>
                      <td><a href="?action=delete&id='.$Navbar['id'].'">delete</a></td>
                      <td><a href="?action=edit&id='.$Navbar['id'].'">edit</a></td>
                  </tr>';
          }
      }else{
          echo '<tr>
                  <td colspan="4">no category found</td>
              </tr>';
      }
      ?>
    </table>
</div>
<?php
require_once 'template/footer.php';
?>
