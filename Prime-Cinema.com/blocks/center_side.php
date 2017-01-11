<?php
    $lab = $_GET['lab'];
    if($lab < 1){
        $lab = 1;
    }
    require 'application/lab'. $lab .'.php'; 
?>