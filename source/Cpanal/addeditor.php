<?php
require_once 'template/header.php';
require_once 'template/navbar.php';
require_once '../lib.php';
adminlog::session();
?>
<?php
    if(isset($_POST['addEditor'])){
        // collect data
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        // check data valid or no
        if($name == null){
            echo "please insert the value of name";
        }elseif($salary == null){
            echo "please insert the value of salary";
        }elseif(!is_numeric($salary)){
            echo "the value of name must be digits";
        }else{
            $editor = new Editor($name,$salary);
            if($editor->addEditor()){
                echo "success";
            }else{
                echo "fail";
            }
        }
    }
?>
<div id="content">
    <form action="addeditor.php" method="POST">
        <label>editor name</label>
        <input type="text" name="name" />
        <label>editor salary</label>
        <input type="text" name="salary" />
        <input type="submit" name="addEditor" value="add editor"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>
