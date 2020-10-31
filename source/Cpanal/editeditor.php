<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
require_once '../lib.php';
adminlog::session();
?>
<div id="content">
      <?php
          if(isset($_GET['action'], $_GET['id'])){
              $action = $_GET['action'];
              $id = $_GET['id'];
              switch($action){
                  case 'delete':
                      Editor::deleteEditor($id);
                      break;
                  case 'edit':
                      $editor = Editor::retreiveEditor($id);
                      if(is_array($editor)){
                          echo '<form action="editeditor.php" method="POST">
                                  <label>editor name</label>
                                  <input type="text" name="name" value="'.$editor['name'].'"/>
                                  <label>editor salary</label>
                                  <input type="text" name="salary" value="'.$editor['salary'].'"/>
                                  <input type="hidden" name="id" value="'.$editor['id'].'"/>
                                  <input type="submit" name="updateEditor" value="update editor" />
                              </form>';
                      }else{
                          echo "no editor found";
                      }
                      break;
                  default:
                      echo 'invalid action';
              }
          }

          if(isset($_POST['updateEditor'])){
              // collect data
              $name = $_POST['name'];
              $salary = $_POST['salary'];
              $id = $_POST['id'];
              // check data valid or no
              if($name == null){
                  echo "please insert the value of name";
              }elseif($salary == null){
                  echo "please insert the value of salary";
              }elseif(!is_numeric($salary)){
                  echo "the value of name must be digits";
              }else{
                  $editor = new Editor($name, $salary, $id);
                  if($editor->updateEditor()){
                      echo "success";
                  }else{
                      echo "fail";
                  }
              }
          }
      ?>
      <table border="1" width="80%">
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Salary</th>
              <th>Delete</th>
              <th>Edit</th>
          </tr>
          <?php

              $allEditors = Editor::retreiveAllEditors();
              if(is_array($allEditors) && count($allEditors) > 0){
                  foreach ($allEditors as $editor){
                      echo '<tr>
                              <td>'.$editor['id'].'</td>
                              <td>'.$editor['name'].'</td>
                              <td>'.$editor['salary'].'</td>
                              <td><a href="?action=delete&id='.$editor['id'].'">delete</a></td>
                              <td><a href="?action=edit&id='.$editor['id'].'">edit</a></td>
                          </tr>';
                  }
              }else{
                  echo '<tr>
                          <td colspan="5">no editors found</td>
                      </tr>';
              }
          ?>
    </table>
    <button><a href="addeditor.php">Add New Editor</a></button>
</div>
<?php
require_once 'template/footer.php';
?>
