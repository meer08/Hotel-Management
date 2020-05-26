
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
  $link = mysql_connect("localhost", "root", "meera");
  mysql_select_db("dsadb");
  $sql = "SELECT data FROM upload_image WHERE id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo $row['dvdimage'];
}
?>
