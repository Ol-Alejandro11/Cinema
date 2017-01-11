<?php
    include "php/configuration.php";
    include "php/functions.php";
?>
 <?php 
            if(isset($_POST['submit'])){
                $name = $_POST['name_of_film'];
                $year = $_POST['year'];
                $budget = $_POST['budget'];
                $country = $_POST['country'];
                $genre = $_POST['genre'];
                $producer = $_POST['producer'];
                $strSQL = "INSERT INTO Film(name_film, year, budget, id_country,id_genre,id_producer)
                           VALUES('" .$name ."','".$year."','".$budget."','".$country."','". $genre."','".$producer."')";    
                $rs = mysql_query($strSQL);
            }
?>
    <center>   
        <div class="frame">    
            <h2>Зчитана таблиця з БД</h2>
            <center><label class="btn1" for="modal-window-1">Open</label></center>
        
            <div class="modal-window">
                <input class="modal-window-open" id="modal-window-1" type="checkbox" hidden style="display:none;">
                <div class="modal-window-wrap" aria-hidden="true" role="dialog">
                    <label for="modal-window-1" class="modal-window-overlay"></label>
                    <div class="modal-window-dialog">
                        <div class="modal-window-header">
                            <label class="btn1-close" for="modal-window-1" aria-hidden="true">×</label>
                        </div>
                        <div class="modal-window-body">
                            <form method="post">
                                <div class="field">
                                    <label for="name_of_film">Назва фільму</label>
                                    <input type="text" id="name_of_film" name="name_of_film" pattern="^[А-Яа-яЇїЄєІі\s]+$">
                                </div>
                                <div class="field">
                                    <label for="country">Країна</label>
                                    <select name='country' id='country' style="width:100%; height:30px;">
                                        <?php 
                                            $strQuery = 'select * from Country';
                                            $recordSet = mysql_query($strQuery) or die('Запрос не удался: ' . mysql_error());
                                           
                                            while($row = mysql_fetch_array($recordSet)) {    
                                                echo "<option value='" . $row[id_country] . "'>" . $row[name_country] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="genre">Жанр</label>
                                    <select name='genre' id='genre' style="width:100%; height:30px;">
                                        <?php
                                            
                                            $strQuery = 'select * from Genre';
                                            $recordSet = mysql_query($strQuery) or die('Запрос не удался: ' . mysql_error());
                                           
                                            while($row = mysql_fetch_array($recordSet))
                                            {    
                                               echo "<option value='".$row[id_genre]."'>".$row[name_genre]."</option>";
                                            }
                                            echo " </select>";
                                        ?>
                                   
                                </div>
                                <div class="field">
                                    <label for="year">Рік</label>
                                    <select name="year" id="year" style="width:100%; height:30px;">
                                        <?php
                                            for($i = 1900; $i <= date('Y'); $i++)
                                            {
                                                echo("<option value='$i'>$i</option>");
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="field">
                                    <label for="budget">Бюджет</label>
                                    <input type="text" id="budget" name="budget" placeholder="" required>
                                </div>
                                <div class="field">
                                    <label for="producer">Режисер</label>
                                    <select name="producer" id="producer" style="width:100%; height:30px;">
                                        <?php
                                            $strQuery = 'select * from Producer';
                                            $recordSet = mysql_query($strQuery) or die('Запрос не удался: ' . mysql_error());

                                            while($row = mysql_fetch_array($recordSet))
                                            {    
                                                echo("<option value='" . $row[id_producer] . "'>" . $row[name_producer] . "</option>");
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input name="submit" class="btn1" type="submit" value="Отправить" />
                            </form>
                        </div>

                    </div>       
                </div>
            </div>
        
             <?php        
                $strQuery = "SELECT f.name_film, c.name_country, g.name_genre, f.year, f.budget, p.name_producer FROM Film f, Producer p, Country c, Genre g  WHERE f.id_country = c.id_country AND f.id_producer = p.id_producer AND f.id_genre = g.id_genre ";
                $recordSet = mysql_query($strQuery);
                $array = array();
            
                while($row = mysql_fetch_array($recordSet)) {
                    $array[] = $row;    
                }    
            
                buildNormTable($array);
             ?>
        </div>
       
        <div class="frame">    
            <?php
                echo "<h2>Відсортована таблиця</h2>";
            
                $strQuery = "SELECT f.name_film, c.name_country, g.name_genre, f.year, f.budget, p.name_producer FROM Film f, Producer p, Country c, Genre g  WHERE f.id_country = c.id_country AND f.id_producer = p.id_producer AND f.id_genre = g.id_genre ORDER BY f.budget";    
                $recordSet = mysql_query($strQuery);
                $array = array();
            
                while($row = mysql_fetch_array($recordSet)) {
                    $array[] = $row;    
                }    
            
                buildNormTable($array);
                
                $strQuery = "SELECT AVG(f.budget) FROM Film f, Country c WHERE f.id_country = c.id_country AND c.name_country ='Україна'";    
                $result = mysql_query($strQuery);
            
                while($row = mysql_fetch_array($result)) {
                    echo ("Budget : " . $row['AVG(f.budget)']);   
                }  
            
            ?>
        </div>
	
        <div class="frame">
            <?php
                print "<h2>Відсортована таблиця</h2>";
                
                $strQuery = "SELECT f.name_film, c.name_country, g.name_genre, f.year, f.budget, p.name_producer FROM Film f, Producer p, Country c, Genre g  WHERE f.id_country = c.id_country AND f.id_producer = p.id_producer AND f.id_genre = g.id_genre ORDER BY f.budget DESC";    
                $recordSet = mysql_query($strQuery);
                $array = array();
                
                while($row = mysql_fetch_array($recordSet)) {
                    $array[] = $row;    
                }    
            
                buildNormTable($array);
              
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
                if($_POST['btnsearch']) {
                    $strQuery = "SELECT f.name_film, c.name_country, g.name_genre, f.year, f.budget, p.name_producer FROM Film f, Producer p, Country c, Genre g  WHERE f.id_country = c.id_country AND f.id_producer = p.id_producer AND f.id_genre = g.id_genre and f.name_film like '%" . $_POST['search'] . "%'";
                    $recordSet = mysql_query($strQuery);
                    $array = array();
                
                    while($row = mysql_fetch_array($recordSet)) {
                        $array[] = $row;    
                    }    
            
                    buildNormTable($array);
                }
            ?>
	 </div>
</center>