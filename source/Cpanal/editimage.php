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
                images::deleteimage($id);
                break;
            case 'edit':
                $images = images::retreiveimage($id);
                if(is_array($images)){
                    echo '<form action="editimage.php" method="POST">
                        <label>Add Image</label>
                        <input type="file" name="image" />
                        <label>Belong To</label>
                        <select name="id_news">';
                              $allNews= News::retreiveAllNews();/////title from last 10 New
                              if(is_array($allNews) && count ($allNews)>0){
                                foreach($allNews as $all){
                                      echo'<option value="'.$all['id'].'">'.$all['title'].'</option>';
                                  }
                              };
                              echo'
                        </select>
                        <input type="submit" name="updateimage" value="Update image"/>
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
    if(isset($_POST['updateimage'])){
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
          if($addimage->updateimage()){
            echo "success";
          }else{
            echo "Fail";
          }
      }
  }
?>
    <table>
        <tr>
            <th>id</th>
            <th>id_image</th>
            <th>image</th>
            <th>delete</th>
            <th>edit</th>
        </tr>
        <?php
        $allimages = images::retreiveAllimages();
        if(is_array($allimages) && count($allimages) >0) {
            foreach ($allimages as $imagesa){
                echo '<tr>
                        <td>'.$imagesa['id'].'</td>
                        <td>'.$imagesa['id_news'].'</td>
                        <td>'.$imagesa['image'].'</td>
                        <td><a href="?action=delete&id='.$imagesa['id'].'">delete</a></td>
                        <td><a href="?action=edit&id='.$imagesa['id'].'">edit</a></td>
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
