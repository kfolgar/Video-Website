<?php

define('DB_SERVER','localhost') ;
define('DB_NAME','usuarios') ;
define('DB_USER','webuser') ;
define('DB_PASS','webuser') ;

$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS) ;
mysql_select_db(DB_NAME,$con) ;

?>