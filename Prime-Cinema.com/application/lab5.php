    <center>   
        <div class="frame">    
            <h2>Зчитана таблиця з БД</h2>
            <label title="Контактная форма в модальном окне" class="btn" for="modal-2">Add set</label>
            <div class="modal">
                 <input class="modal-open" id="modal-2" type="checkbox" hidden>
                 <div class="modal-wrap" aria-hidden="true" role="dialog">
                 <label class="modal-overlay" for="modal-2"></label>
                 <div class="modal-dialog">
                     <div class="modal-header">
                     <h2>Форма :)</h2>
                     <label class="btn-close" for="modal-2" aria-hidden="true">×</label>
                     </div>
                  <div class="modal-body">
                      <form method="post">
                          <div class="field">
                              <label for="name_of_film">Назва фільму</label>
                              <input type="text" id="name_of_film" name="name_of_film" pattern="^[А-Яа-яЇїЄєІі\s]+$" required>
                          </div>
                          <div class="field">
                              <label for="country">Країна</label>
                              <input type="text" id="country" name="country" placeholder="" pattern="^[А-Яа-яЇїЄєІі\s]+$" required>   
                          </div>
                          <div class="field">
                              <label for="genre">Жанр</label>
                              <input type="text" id="genre" name="genre" pattern="^[А-Яа-яЇїЄєІі\s]+$" required>
                          </div>
                          <div class="field">
                              <label for="year">Рік</label>
                              <input type="text" id="year" name="year" placeholder="" pattern="[0-9]{4}" required>
                          </div>
                          <div class="field">
                              <label for="budget">Бюджет</label>
                              <input type="text" id="budget" name="budget" placeholder="" pattern="[0-9]{1,11}" required>
                          </div>
                          <div class="field">
                              <label for="producer">Режисер</label>
                              <input type="text" id="producer" name="producer" placeholder="" pattern="^[А-Яа-яЇїЄєІі\s]+$" required>
                          </div>
                          <input name="submit" class="btn" type="submit" value="Отправить" />
                      </form>
                  </div>
                </div>
              </div>
            </div>
             <?php
                include "php/configuration.php";
                include "php/functions.php";
                
                $strQuery = "SELECT * FROM PrimeCinema";
                $recordSet = mysql_query($strQuery);
                $array = array();
            
                while($row = mysql_fetch_array($recordSet)) {
                    $array[] = $row;    
                }    
            
                buildTable($array);
             ?>
        </div>
        <?php 
            if($_POST['submit']){
                $name = $_POST['name_of_film'];
                $country = $_POST['country'];
                $genre = $_POST['genre'];
                $year = $_POST['year'];
                $budget = $_POST['budget'];
                $producer = $_POST['producer'];
                $strSQL = "INSERT INTO PrimeCinema(name,country,genre,year,budget,producer)
                           VALUES('" . $name ."','".$country."','". $genre."','".$year."','".$budget."','".$producer."')";    
                $rs = mysql_query($strSQL);
            }
        ?>
        <div class="frame">    
            <?php
                echo "<h2>Відсортована таблиця</h2>";
            
                $strQuery = "SELECT * FROM PrimeCinema ORDER BY budget";    
                $recordSet = mysql_query($strQuery);
                $array = array();
            
                while($row = mysql_fetch_array($recordSet)) {
                    $array[] = $row;    
                }    
            
                buildTable($array);
                
                $strQuery = "SELECT AVG(budget) FROM PrimeCinema WHERE country='Україна'";    
                $result = mysql_query($strQuery);
                //var_dump($mark['avgColName']);
                while($row = mysql_fetch_array($result)) {
                    echo ("Budget : " . $row['AVG(budget)']);   
                }  
            
            ?>
        </div>
	
        <div class="frame">
            <?php
                print "<h2>Відсортована таблиця</h2>";
                
                $strQuery = "SELECT * FROM PrimeCinema ORDER BY budget";    
                $recordSet = mysql_query($strQuery);
                $array = array();
                
                while($row = mysql_fetch_array($recordSet)) {
                    $array[] = $row;    
                }    
            
                buildTable($array);
              
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
                    $strQuery = "SELECT * FROM PrimeCinema WHERE name LIKE '%" .$_POST['search']. "%' ORDER BY budget DESC";
                    $recordSet = mysql_query($strQuery);
                    $array = array();
                
                    while($row = mysql_fetch_array($recordSet)) {
                        $array[] = $row;    
                    }    
            
                    buildTable($array);
                }
            ?>
	 </div>
</center>