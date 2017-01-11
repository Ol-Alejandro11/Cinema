<?php 
    include "php/config.php";
    include "classes/Database.php";
    include "classes/Page.php";
    
    $page = new Page();
    /*if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        if($id != 0) {
            $text = $page->get_one($id);
            echo $page->get_body($text,'view');
            exit();
        }
        else {
            exit('wrong parameter');
        }
    }
    else {}*/

        $text = $page->get_all();
        echo $page->get_body($text,'main');
	

?>