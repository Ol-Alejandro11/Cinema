<!DOCTYPE html">
<html>
<head>
<title></title>
<meta name="" content="">
<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
</head>
<body>
<center>
	<?php
     print "<table class='cinemaTables'>";
        print "<tr>
            <td> Назва фільму </td>
            <td> Країна </td>
            <td> Жанр </td> 
            <td> Рік </td>
            <td> Бюджет </td>
            <td> Режисер </td>
        </tr>";
        foreach($text as $item) {
            echo("<tr>");
                echo("<td>" . $item['name_film'] . "</td>");
                echo("<td>" . $item['name_country'] . "</td>");
                echo("<td>" . $item['name_genre'] . "</td>");
                echo("<td>" . $item['year'] . "</td>");
                echo("<td>" . $item['budget'] . "</td>");
                echo("<td>" . $item['name_producer'] . "</td>");
                
            echo("</tr>");
        }
       
        print "</table>";
    
    
    ?>
    </center>
</body>
</html>

