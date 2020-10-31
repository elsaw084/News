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
                  Category::deleteCategory($id);
                  break;
              case 'edit':
                  $category = Category::retreiveCategory($id);
                  if(is_array($category)){
                      echo '<form action="editcategory.php" method="POST">
                          <label>category name</label>
                          <input type="text" name="name" value="'.$category['name'].'"/>
                          <label>category manager</label>
                          <select name="id_manager">';
                                 $allEditors = Editor::retreiveAllEditors();
                                 foreach ($allEditors as $editor){
                                     echo '<option value="'.$editor['id'].'">'.$editor['name'].'</option>';
                                 }
                              echo ' </select>
                             <input type="hidden" name="id" value="'.$category['id'].'"/>
                          <input type="submit" name="updateCategory" value="update category"/>
                      </form>';
                  }else{
                      echo "no category found";
                  }
                  break;
              default:
                  echo 'invalid action';
          }
      }

      // update category
      if(isset($_POST['updateCategory'])){
          // collect data
          $name = $_POST['name'];
          $id_manager = $_POST['id_manager'];
          $id = $_POST['id'];
          // check data valid or no
          if($name == null){
              echo "please insert the value of name";
          }elseif($id_manager == null){
              echo "please insert the value of name";
          }elseif(!is_numeric($id_manager)){
              echo "please insert the value of name";
          }else{
              // operations
              $category = new Category($name, $id_manager, $id);
              echo $category->updateCategory();
          }
      }
  ?>
  <table>
      <tr>
          <th>id</th>
          <th>category name</th>
          <th>delete</th>
          <th>edit</th>
      </tr>
      <?php
      $allCategories = Category::retreiveAllCategorys();
      if(is_array($allCategories) && count($allCategories) >0) {
          foreach ($allCategories as $category){
              echo '<tr>
                      <td>'.$category['id'].'</td>
                      <td>'.$category['name'].'</td>
                      <td><a href="?action=delete&id='.$category['id'].'">delete</a></td>
                      <td><a href="?action=edit&id='.$category['id'].'">edit</a></td>
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
