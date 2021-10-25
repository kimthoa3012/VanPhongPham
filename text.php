<?php
 if(strpos($_SERVER['REQUEST_URI'], 'text.php')>0) echo' '; else echo' hero-normal';
// strpos($_SERVER['REQUEST_URI'], 'index.php')>0 ? echo'no' : echo' hero-normal'

?>