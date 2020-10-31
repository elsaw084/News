<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
require_once '../lib.php';
adminlog::session();
?>
<div id="content">
  <?php
      if(isset($_POST['addimage'])){
          // collect data
          $image = $_POST['image'];
          $id_news = $_POST['id_news'];
          // check data valid or no
          if($image == null){
              echo "please insert the value of file";
          }elseif(!is_numeric($id_news)){
              echo "please insert the value of news";
          }else{
              // operations
              $addimage = new images($id_news ,$image);
              if($addimage->addimage()){
                echo "success";
              }else{
                echo "Fail";
              }
          }
      }
  ?>
    <form action="addimage.php" method="POST">
        <label>Add Image</label>
        <input type="file" name="image" />
        <label>Belong To</label>
        <select name="id_news">
          <?php
              $allNews= News::retreiveAllNews();/////title from last 10 New
              if(is_array($allNews) && count ($allNews)>0){
                foreach($allNews as $all){
                      echo '<option value="'.$all['id'].'">'.$all['title'].'</option>';
                  }
              }
          ?>
        </select>
        <input type="submit" name="addimage" value="add image"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>
