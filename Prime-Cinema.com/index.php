<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Prime-Cinema</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/Style_for_lab2.css">
		<link rel="stylesheet" href="css/Style_for_lab4.css">
		<link rel="stylesheet" href="css/Style_for_lab5.css">
		<link rel="stylesheet" href="css/Style_for_lab6.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
        <script  type="text/javascript">
                    $(document).ready(function() {
                    $(window).scroll(function() {
                    if($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                    } else {
                    $('.scrollup').fadeOut();
                    }
                    });

                    $('.scrollup').click(function() {
                    $("html, body").animate({ scrollTop: 0 }, 600);
                    return false;
                    });

                    });
             
        </script>
           
	</head>
	
	<body>
            <div id="header">
                <?php include "blocks/header.php"; ?>
            </div>
            <div id="outer_block">
            <div id="inner_block">
                <div id="left_side">
                    <?php include "blocks/left_side.php"; ?>     
                </div>
                <div id="center_side">
                    <?php include "blocks/center_side.php"; ?>
                </div>
            </div>
            </div>
            <footer>
               <?php include "blocks/footer.php"; ?>
            </footer>
            <a href="#" class="scrollup">Наверх</a>
    </body>
	
</html>