<center>
   <time datetime="YYYY-MM-DDThh:mm:ssTZD">
    <h2>Дата та час народження</h2>
    <form id="file"  method="post">
        <input name="dateFrom" type="datetime-local">         
        <input type="submit" class="button_lab2" id="submit" name="submit" value="Доповнити">
        <input  class="button_lab2" name="clean" value="Стерти" type="reset">
    </form>

    <?php
       if(isset($_POST['dateFrom'])){
            $time = strtotime($_POST['dateFrom']);
            $datetime1 = strtotime($_POST['dateFrom']);
            $datetime2 = strtotime("now");
            $interval  = abs($datetime2 - $datetime1);
            $minutes   = round($interval / 60);
            echo 'Diff. in minutes is: '.$minutes; 
       }            
    ?>
 </center>   