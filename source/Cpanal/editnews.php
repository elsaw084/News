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
                News::deleteNews($id);
                break;
            case 'edit':
                $news = News::retreiveNews($id);
                if(is_array($news)){
                    echo '<form action="editnews.php" method="POST">
                        <label>news title</label>
                        <input type="text" name="title" value='.$news['content'].' />
                        <label>news content</label>
                        <textarea name="content">'
                        .$news['content'].'
                        </textarea>
                        <label>belong to</label>
                        <select name="id_category">';
                              $allCategorys = Category::retreiveAllCategorys();
                              foreach ($allCategorys as $category){
                                  echo '<option value='.$category['id'].'>'.$category['name'].'</option>';
                              }
                          echo'
                        </select>
                        <label>written by</label>
                        <select name="id_editor">';
                              $allEditors = Editor::retreiveAllEditors();
                              foreach ($allEditors as $editor){
                                  echo '<option value='.$editor["id"].'>'.$editor['name'].'</option>';
                              }
                              echo'
                        </select>
                        <input type="hidden" name="id" value='.$news['id'].' />
                        <input type="submit" name="updateNews" value="Update news"/>
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
    if(isset($_POST['updateNews'])){
        // collect data
        $title = $_POST['title'];
        $content = $_POST['content'];
        $id_category = $_POST['id_category'];
        $id_editor = $_POST['id_editor'];
        $id = $_POST['id'];
        // check data valid or no
        if($title == null){
            echo getNullMessage("News Title");
        }elseif($content == null){
            echo getNullMessage("News Content");
        }elseif($id_category == null){
            echo getNullMessage("category name");
        }elseif(!is_numeric($id_category)){
            echo getNullMessage("category id");
        }elseif($id_editor == null){
            echo getNullMessage("editor name");
        }elseif(!is_numeric($id_editor)){
            echo getNullMessage("editor id");
        }else{
            // operations
            $addNews = new News($title, $content , $id_category ,$id_editor, $id);
            if($addNews->updateNews()){
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
            <th>news title</th>
            <th>delete</th>
            <th>edit</th>
        </tr>
        <?php
        $allNews = News::retreiveAllNews();
        if(is_array($allNews) && count($allNews) >0) {
            foreach ($allNews as $news){
                echo '<tr>
                        <td>'.$news['id'].'</td>
                        <td>'.$news['title'].'</td>
                        <td><a href="?action=delete&id='.$news['id'].'">delete</a></td>
                        <td><a href="?action=edit&id='.$news['id'].'">edit</a></td>
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
