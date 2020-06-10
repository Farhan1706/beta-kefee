<?php

$dbcon = mysql_connect('localhost', 'id13990263_root', 'Farhan1706!N');
            if (!$dbcon) {
                die('Not connected : ' . mysql_error());
            }
            
            $db_selected = mysql_select_db('id13990263_kefe', $dbcon);
            if (!$db_selected) {
                die ('Can\'t use foo : ' . mysql_error());
            }

?>