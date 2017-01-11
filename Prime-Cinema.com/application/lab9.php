<center>
    <form action="" method="post">
        <input type="text" name="strarr"><br>
        <input type="submit" name="sub1">
        <input type="reset">
    </form>

<img src="brain.png" alt="">

    <?php
       if($_POST[sub1]) {
           $strArray = $_POST[strarr];
           
       }
       
    $rows= array();
    $rows = explode(" ",$strArray); 

    $width = 500; 
    $height = 300; 
    $row_width = 40; 
    $row_interval = 10; 

    $img = imagecreatetruecolor($width, $height); 

    $white = imagecolorallocate($img, 255, 255, 255); 
    imagefill($img, 0, 0, $white); 

    for($i = 0, $y1 = $height, $x1 = 0; $i < count($rows); $i++)  { 
        
    $color = imagecolorallocate($img, 
    rand(0, 255), rand(0, 255), rand(0, 255)); 

    $y2 = $y1 - $rows[$i] * $height/100; 
    $x2 = $x1 + $row_width; 

    imagefilledrectangle($img, $x1, $y1, $x2, $y2, $color); 

    $x1 = $x2 + $row_interval; 
    } 
 
    imagepng($img,"brain.png"); 
    imagedestroy($img);
?>
</center>