<html>
    <body>
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
    </body>
</html>