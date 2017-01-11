<script>
     function writeData() {
                var varbool = true;
                if (document.getElementById("name_of_film").value == "") { varbool = false; }
                if (document.getElementById("country").value == "") { varbool = false; }
                if (document.getElementById("genre").value == "") { varbool = false; }
                if (document.getElementById("year").value == "") { varbool = false; }
                if (isNaN(document.getElementById("budget").value)) { varbool = false; }
                if (isNaN(document.getElementById("w").value)) { varbool = false; }
                if (document.getElementById("w").value == "") { varbool = false; }
                if (varbool)
                {
                    var form = document.getElementsByTagName("form");
                    form[0].submit();     
                }
                else
                {
                    alert('Not correct!');
                }
</script>
  <center>
   <h2>Інформація з файлу</h2>
        <?php
        $fileCinema = fopen("data/lab2.txt","r");  
        if(!file) {
                echo("Помилка відкриття файлу");
                exit();
            }
        else {
			print "<table id = 'cinemaTable'>";
			print "<tr> <td> Назва фільму </td><td> Країна </td><td> Жанр </td> <td> Рік </td> <td> Бюджет </td> <td> Режисер </td> </tr>";
			
			while (!feof($fileCinema)) { 
				$arrCar= explode("\t",fgets($fileCinema)); 
				print "<tr>";
				for( $i = 0; $i < 6; $i++) 
                    {
                     print "<td>$arrCar[$i]</td>";
                    }
				print "</tr>";
			}
			print "</table>";
		}
          fclose ($fileCinema);   
        ?>
              
</center>        
        
<body>
   <center>
    <label title="Контактная форма в модальном окне" class="btn" for="modal-2">Пример 2</label>
</center>
    
    
     <div class="modal">
  <input class="modal-open" id="modal-2" type="checkbox" hidden>
  <div class="modal-wrap" aria-hidden="true" role="dialog">
    <label class="modal-overlay" for="modal-2"></label>
    <div class="modal-dialog">
      <div class="modal-header">
        <h2>Форма в Модальное окно! :)</h2>
        <label class="btn-close" for="modal-2" aria-hidden="true">×</label>
      </div>
      <div class="modal-body">
          <form>
	         <div class="field">
                        <label for="name_of_film">Назва фільму</label>
                        <input type="text" id="name_of_film" pattern="^[А-Яа-яЇїЄєІі\s]+$">
                    </div>
                    <div class="field">
                        <label for="country">Країна</label>
                        <input type="text" id="country" placeholder="">   
                    </div>
                    <div class="field">
                        <label for="genre">Жанр</label>
                        <input type="text" id="genre">
                    </div>
                    <div class="field">
                        <label for="year">Рік</label>
                        <input type="text" id="year" placeholder="">
                    </div>
                    <div class="field">
                        <label for="budget">Бюджет</label>
                        <input type="text" id="budget" placeholder="">
                    </div>
                    <div class="field">
                        <label for="producer">Режисер</label>
                        <input type="text" id="producer" placeholder="">
                    </div>
                    <input name="submit" class="btn" type="submit" value="Отправить" />
          </form>
      </div>
    </div>
  </div>
</div>
