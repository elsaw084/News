<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
require_once '../lib.php';
adminlog::session();
?>
<div id="content">
  <?php
        if(isset($_POST['addNews'])){
            // collect data
            $title = $_POST['title'];
            $content = $_POST['content'];
            $id_category = $_POST['id_category'];
            $id_editor = $_POST['id_editor'];
            // check data valid or no
            if($title == null){
                echo "please insert the value of name";
            }elseif($content == null){
                echo "please insert the value of name";
            }elseif($id_category == null){
                echo "please insert the value of name";
            }elseif(!is_numeric($id_category)){
                echo "please insert the value of name";
            }elseif($id_editor == null){
                echo "please insert the value of name";
            }elseif(!is_numeric($id_editor)){
                echo "please insert the value of name";
            }else{
                $addNews = new News($title, $content , $id_category, $id_editor);
                if($addNews->addNews()){
                  echo "success";
                }else{
                  echo "Fail";
                }
            }
        }
    ?>
    <form action="addnews.php" method="POST">
        <label>news title</label>
        <input type="text" name="title" />
        <label>news content</label>
        <textarea name="content">
        </textarea>
        <label>belong to</label>
        <select name="id_category">
          <?php
              $allCategorys = Category::retreiveAllCategorys();
              foreach ($allCategorys as $category){
                  echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
              }
          ?>
        </select>
        <label>written by</label>
        <select name="id_editor">
          <?php
              $allEditors = Editor::retreiveAllEditors();
              foreach ($allEditors as $editor){
                  echo '<option value="'.$editor['id'].'">'.$editor['name'].'</option>';
              }
          ?>
        </select>
        <input type="submit" name="addNews" value="add news"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>
