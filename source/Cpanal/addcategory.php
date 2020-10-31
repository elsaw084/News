<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
require_once '../lib.php';
adminlog::session();
?>
<div id="content">
  <?php
      if(isset($_POST['addCategory'])){
          // collect data
          $name = $_POST['name'];
          $id_manager = $_POST['id_manager'];
          // check data valid or no
          if($name == null){
              echo "please insert the value of name";
          }elseif($id_manager == null){
              echo "please insert the value of id_manager";
          }elseif(!is_numeric($id_manager)){
              echo "the value of name must be digits";
          }else{
              // operations
              $category = new Category($name, $id_manager);
              if($category->addCategory()){
                echo "success";
              }else{
                echo "Fail";
              }
          }
      }
  ?>
    <form action="addcategory.php" method="POST">
        <label>Category name</label>
        <input type="text" name="name" />
        <label>category manager</label>
        <select name="id_manager">
          <?php
              $allEditors = Editor::retreiveAllEditors();
              foreach ($allEditors as $editor){
                  echo '<option value="'.$editor['id'].'">'.$editor['name'].'</option>';
              }
          ?>
        </select>
        <input type="submit" name="addCategory" value="add category"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>
