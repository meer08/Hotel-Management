<?php


$db="dsadb";

      $conn = @mysql_connect("localhost", "root", "meera")
         or die ("Could not connect to database");

      $rs= @mysql_select_db ($db, $conn)
           or die ("Could not open $db:".mysql_error());

?>
