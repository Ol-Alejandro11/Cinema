<?php
    class Database {
        public $db;

        public function __construct($host,$user,$pass,$db) {
            $this->$db = mysql_connect($host,$user,$pass);
            if(!$this->$db) {
                exit('No connection with database');
            }
            if(!mysql_select_db($db,$this->$db)) {
                exit('No table');
            }

            return $this->db;
        }

        public function get_all_db() {
            $sql = "SELECT f.name_film, c.name_country, g.name_genre, f.year, f.budget, p.name_producer FROM Film f, Producer p, Country c, Genre g  WHERE f.id_country = c.id_country AND f.id_producer = p.id_producer AND f.id_genre = g.id_genre ";

            $res = mysql_query($sql);

            if(!$res) {
                return FALSE;
            }
            for ($i = 0;$i < mysql_num_rows($res); $i++) {
                $row[] = mysql_fetch_array($res,MYSQL_ASSOC);
            }

            return $row;
        }

        public function get_one_db($id) {

            $sql = "SELECT f.name_film, c.name_country, g.name_genre, f.year, f.budget, p.name_producer FROM Film f, Producer p, Country c, Genre g  WHERE f.id_country = c.id_country AND f.id_producer = p.id_producer AND f.id_genre = g.id_genre WHERE g.id_genre ='$id'";
            $res = mysql_query($sql);

            if(!$res) {
                return FALSE;
            }
            $row = mysql_fetch_array($res,MYSQL_ASSOC);

            return $row;
        }
    }
?>