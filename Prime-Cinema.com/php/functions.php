<?php
    function buildTable($array) {
        
        print "<table class='cinemaTables'>";
        print "<tr>
            <td> Назва фільму </td>
            <td> Країна </td>
            <td> Жанр </td> 
            <td> Рік </td>
            <td> Бюджет </td>
            <td> Режисер </td>
        </tr>";
        
        $i = 0;
        while($i < count($array)) {
            echo("<tr>");
                echo("<td>" . $array[$i][1] . "</td>");
                echo("<td>" . $array[$i][2] . "</td>");
                echo("<td>" . $array[$i][3] . "</td>");
                echo("<td>" . $array[$i][4] . "</td>");
                echo("<td>" . $array[$i][5] . "</td>");
                echo("<td>" . $array[$i][6] . "</td>");
            echo("</tr>");
            $i++;
        }
        
        print "</table>";
    }
    function buildNormTable($array) {
        
        print "<table class='cinemaTables'>";
        print "<tr>
            <td> Назва фільму </td>
            <td> Країна </td>
            <td> Жанр </td> 
            <td> Рік </td>
            <td> Бюджет </td>
            <td> Режисер </td>
        </tr>";
        
        $i = 0;
        while($i < count($array)) {
            echo("<tr>");
                echo("<td>" . $array[$i][0] . "</td>");
                echo("<td>" . $array[$i][1] . "</td>");
                echo("<td>" . $array[$i][2] . "</td>");
                echo("<td>" . $array[$i][3] . "</td>");
                echo("<td>" . $array[$i][4] . "</td>");
                echo("<td>" . $array[$i][5] . "</td>");
            echo("</tr>");
            $i++;
        }
        
        print "</table>";
    }
?>