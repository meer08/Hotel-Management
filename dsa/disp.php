<?php
$mysqlHostname = "localhost";
$mysqlUsername = "root";
$mysqlPassword = "meera";
//$mysqlPassword = "";
$mysqlDb = "dsadb";

$mysqlDb = "dsadb";

$conn=mysql_connect($mysqlHostname, $mysqlUsername, $mysqlPassword)
or die("Connection to MySQL database failed: ". mysql_error());


mysql_select_db("$mysqlDb")
or die("Selection of database failed: ".mysql_error());

$rs= @mysql_select_db ($mysqlDb, $conn)
or die("Could not open $mysqlDb: ".mysql_error());
$query="select * from upload_image";
$result=mysql_query($query);

while($rows=mysql_fetch_assoc($result));
{
  $id = $rows['id'];
  echo "id ".$id;
  


?>
<html>
<head>
    <title>Retrieve Image from MySQL Database in PHP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container text-center">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imagedata']).'"/>'; ?>
    </div>
</body>
</html>
