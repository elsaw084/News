<?php
// database handler
$dbh = new PDO("mysql:dbhost=localhost;dbname=newspaper3", "root", "");
class Editor
{
    // property
    private $id;
    private $name;
    private $salary;
    // method
    public function __construct($name, $salary, $id="")
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->id = $id;
    }
    public function addEditor()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("INSERT INTO editor(name, salary) VALUES('$this->name', '$this->salary')");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateEditor()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("UPDATE editor SET name='$this->name', salary = '$this->salary' WHERE id='$this->id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteEditor($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("DELETE FROM editor WHERE id='$id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function retreiveEditor($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM editor WHERE id='$id'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $editor = $sql->fetch(PDO::FETCH_ASSOC);
        return $editor;
    }

    public static function retreiveAllEditors()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM editor");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $allEditors = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allEditors;
    }
}
class Category
{
    // property
    private $id;
    private $name;
    private $id_manager;
    // method
    public function __construct($name, $id_manager, $id="")
    {
        $this->name = $name;
        $this->id_manager = $id_manager;
        $this->id = $id;
    }
    public function addCategory()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("INSERT INTO category(name, id_manager) VALUES('$this->name', '$this->id_manager')");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateCategory()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("UPDATE category SET name='$this->name', id_manager = '$this->id_manager' WHERE id='$this->id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteCategory($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("DELETE FROM category WHERE id='$id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function retreiveCategory($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM category WHERE id='$id'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $editor = $sql->fetch(PDO::FETCH_ASSOC);
        return $editor;
    }

    public static function retreiveAllCategorys()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM category");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $allCategorys = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allCategorys;
    }
}
/////////////////////////////////
class Navbar
{
    // property
    private $id;
    private $name;
    private $link;
    // method
    public function __construct($name, $link, $id="")
    {
        $this->name = $name;
        $this->id = $id;
        $this->link = $link;
    }
    public function addNavbar()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("INSERT INTO nav(name, link) VALUES('$this->name', '$this->link' )");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateNavbar()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("UPDATE nav SET name='$this->name' , link='$this->link' WHERE id='$this->id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteNavbar($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("DELETE FROM nav WHERE id='$id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function retreiveNavbar($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM nav WHERE id='$id'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $Navbar = $sql->fetch(PDO::FETCH_ASSOC);
        return $Navbar;
    }

    public static function retreiveAllNavbars()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM nav");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $allNavbars = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allNavbars;
    }
}
////////////////////////////////

class News
{
    // property
    private $id;
    private $title;
    private $content;
    private $id_category ;
    private $id_editor;
    // method
    public function __construct($title, $content , $id_category, $id_editor ,$id="")
    {
        $this->title = $title;
        $this->content = $content;
        $this->id_category = $id_category;
        $this->id_editor = $id_editor;
        $this->id = $id;
    }
    public function addNews()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("INSERT INTO news(title, content, id_editor, id_category) VALUES('$this->title', '$this->content', '$this->id_category' ,'$this->id_editor')");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateNews()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("UPDATE news SET title='$this->title', content='$this->content', id_category='$this->id_category', id_editor='$this->id_editor' WHERE id='$this->id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteNews($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("DELETE FROM news WHERE id='$id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function retreiveNews($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news WHERE id='$id'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $news = $sql->fetch(PDO::FETCH_ASSOC);
        return $news;
    }
    ///////////id_category
    public static function retreiveNewssw($id_category)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news WHERE id_category='$id_category'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $news = $sql->fetch(PDO::FETCH_ASSOC);
        return $news;
    }
    //////////////
    ///////////id_category all
    public static function retreiveCategoryNews($id_category)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news WHERE id_category='$id_category'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $news = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $news;
    }
    //////////last News
    public static function retreisvewNews()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news ORDER BY id DESC LIMIT 1");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $news = $sql->fetch(PDO::FETCH_ASSOC);
        return $news;
    }
    ///////////
    //////////last 10 News
    public static function retreisvelastNews()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM ( SELECT * FROM news ORDER BY id DESC LIMIT 5 ) sub ORDER BY id ASC");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $lastanews = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $lastanews;
    }
    ///////////
    //////////last 10 News
    public static function retreisvedifNews()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare(" SELECT * FROM news ORDER BY id DESC LIMIT 5 ");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $difnews = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $difnews;
    }
    ///////////
    public static function retreiveAllNews()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $allnews = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allnews;
    }
    /////////
    ///////////
    public static function retreivecontent()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT LEFT(content,250) FROM news");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $content = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $content;
    }
    /////////////
}

class adminlog
{
  function session(){
    session_start();
    if(!isset($_SESSION['username'], $_SESSION['loggedIn'])){
        // redirect to login page
        header("Location: login.php");
        // for security
        exit();
    }
  }
}
/////images
class images
{
    // property
    private $id_news;
    private $image;
    private $id;
    // method
    public function __construct($id_news, $image ,$id='')
    {
        $this->id_news = $id_news;
        $this->image = $image;
        $this->id = $id;
    }
    public function addimage()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("INSERT INTO news_images( id_news ,image) VALUES( '$this->id_news' ,'$this->image' )");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateimage()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("UPDATE news_images SET id_news='$this->id_news' , image='$this->image' WHERE id='$this->id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    public static function deleteimage($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("DELETE FROM news_images WHERE id='$id'");
        // execute sql query
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function retreiveimage($id)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news_images WHERE id='$id'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $Navbar = $sql->fetch(PDO::FETCH_ASSOC);
        return $Navbar;
    }

    public static function retreiveAllimages()
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news_images");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $allNavbars = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $allNavbars;
    }
    ////////////
    public static function retreiveAllimage($id_news)
    {
        // get connection
        global $dbh;
        // prepare query
        $sql = $dbh->prepare("SELECT * FROM news_images WHERE id_news='$id_news'");
        // execute sql query
        $sql->execute();
        // fetch data as associative array
        $images = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $images;
    }
    ////////////
}
