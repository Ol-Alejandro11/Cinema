    <center>
   <h2>Пошук у файлі</h2>
       <br>
        <?php
        $fileCinema = fopen("data/lab2.txt","r");  
        if(!fileCinema) {
                echo("Помилка відкриття файлу");
                exit();
            }
        else {
            $arrCinema = array();
            $i = 0;
			while (!feof($fileCinema)) { 
				$arrCinema[$i] = explode("\t",fgets($fileCinema)); 
                $i++;
			}
		  }
        function sortCinema($x, $y){
            if($x[4] < $y[4] ){
                return 1;
            }
            if($x[4] > $y[4] ){
                return -1;
            }
            return 0;
        }
        usort($arrCinema, 'sortCinema');
   
        print "<table class = 'searchCinema' >";
			print "<tr> <td> Назва фільму </td><td> Країна </td><td> Жанр </td> <td> Рік </td> <td> Бюджет </td> <td> Режисер </td> </tr>";
        
        $arrCinema = array_reverse($arrCinema);
        foreach($arrCinema as $film){
            print "<tr>";
            foreach($film as $value){
                print( "<td>".$value."</td>");
           }
            print("</tr>");
        }
        print "</table>";
        print "<br>";
        fclose ($fileCinema);     
        ?>  
        <div class="searchBlock">
         <form action="" method="post">
             <label for="search">Search</label>
             <input type="text" id="search" name="search">
             <input type="reset" value="Очистити">
             <input type="submit" value="Пошук" name="btnsearch">
         </form>
       </div>  
       <?php
            print "<br>";
            if($_POST['btnsearch']) {
                $f = false; 
                if (count($arrCinema)){
                    foreach($arrCinema as $one) {
                        if(stristr($one[0], $_POST['search'])){
                            if($flag == false){
                                print "<table id = 'cinemaTable'>";
                                print "<tr> 
                                    <td> Назва фільму </td>
                                    <td> Країна </td>
                                    <td> Жанр </td>
                                    <td> Рік </td>
                                    <td> Бюджет </td>
                                    <td> Режисер </td>
                                    </tr>";
                                }                
                                echo '<td>', $one[0], '</td>',
                                     '<td>', $one[1], '</td>',
                                     '<td>', $one[2], '</td>',
                                     '<td>', $one[3], '</td>',
                                     '<td>', $one[4], '</td>',
                                     '<td>', $one[5], '</td>';
                                echo("</tr>");
                                $flag = true;
                        }
                    }
                }
                echo $flag == true ? "</table>" : "Not found";
           }  
       ?>
</center>        
            
  