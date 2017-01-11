<center>
   <h2>Інформація з файлу</h2>
    <br>
        <?php
        $fileCinema = fopen("data/lab2.txt","r");  
        if(!file) {
                echo("Помилка відкриття файлу");
                exit();
            }
        else {
        
            $arrCinema = array();
            //$i = 0;
			while (!feof($fileCinema)) { 
				$arrCinema[] = explode("\t",fgets($fileCinema)); 
                //$i++;
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
    
        print "<table id = 'cinemaTable'>";
        print "<tr> <td> Назва фільму </td><td> Країна </td><td> Жанр </td> <td> Рік </td> <td> Бюджет </td> <td> Режисер </td> </tr>";
        
        $arrCinema = array_reverse($arrCinema);
        $sum = 0;
        $count = 0;    
        foreach($arrCinema as $film){
                print "<tr>";
                foreach($film as $value){
                    print( "<td>".$value."</td>");
               }
                print("</tr>");
                if($film[1] == "Україна"){
                    $sum+=$film[4];
                    $count++;
                }
        }
        print "</table>";
        print "<br>";
        
        if($count != 0)
            print ("Середній бюджет українських вільмів:".$sum/$count);
        else
             print ("Українці скупі люди і фільмів не знімають");
        fclose ($fileCinema);     
        ?>
</center>        
            
  