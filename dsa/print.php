<?php
ob_start();
error_reporting(0);
SESSION_START();
//echo "appno=".$regno;

$mysqlHostname = "localhost";
$mysqlUsername = "root";
$mysqlPassword = "meera";
$mysqlDb = "dsadb";



 $conn=mysql_connect($mysqlHostname, $mysqlUsername, $mysqlPassword)
   or die("Connection to MySQL database failed: ". mysql_error());

 mysql_select_db("$mysqlDb")
   or die("Selection of database failed: ". mysql_error());

 $rs= @mysql_select_db ($mysqlDb, $conn)
       or die ("Could not open $mysqlDb:".mysql_error());



		$query = "select * from guestdetails2 where gid=$_REQUEST[ttgid]";//selecting from guestdetails2


        $result = mysql_query($query)
               or die ("could not execute the query");//echo mysql_error());

        $num = mysql_numrows($result);




   while($row = mysql_fetch_array($result))
         {
             $arrival = $row ["arrival_date"];
					   $departure = $row ["departure_date"];
					   $room_type = $row ["room_type"];
					   $phone_number = $row ["phone_number"];
					   $address = $row ["address"];
					   $tpersonid = $row ["Personid"];

					   //echo "person id in session =".$_SESSION['personid'];
		//to fetch name from signup
		$query1 = "select * from signup where Personid=$tpersonid";
          #echo $query1;

		$result1 = mysql_query($query1)
               or die ("could not execute the query1");//echo mysql_error());

		//$num1 = mysql_numrows($result1);

		$row1 = mysql_fetch_array($result1);

		$tname=$row1['Name'];
    }
?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Residencia</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" ></script>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.js" ></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="a.css">
      <title>Print Request</title>

      <style>
      .one{
        font-family: 'Poiret One', cursive;
        font-size: 20px;
        font-weight: bold;
      }
      .two{
        font-family: 'Poiret One', cursive;
        font-size: 16px;

      }
      </style>
</head>


<body>
<table align="center">
    <tr><td  width="15"><img src="images/logo3.png"></td></tr>
</table>

<br/><br/><br/><br/>

<div class="container">
  <h2 class="one">Guest Details</h2>
  <table class="table two">
    <tbody>
      <tr>
        <td><b> Guest Name </b></td>
        <td> <?php echo $tname; ?> </td>
      </tr>

      <tr>
        <td><b> Arrival Date </b></td>
        <td> <?php echo $arrival; ?>  </td>
      </tr>

      <tr>
        <td><b> Departure Date </b></td>
        <td> <?php echo $departure; ?> </td>
      </tr>

      <tr>
        <td><b> Room type </b></td>
        <td> <?php echo $room_type; ?> </td>
      </tr>

      <tr>
        <td><b> Phone Number </b></td>
        <td> <?php echo $phone_number; ?> </td>
      </tr>

      <tr>
        <td><b> Address </b></td>
        <td> <?php echo $address; ?> </td>
      </tr>

    </tbody>
  </table>
</div>





<table width="100%"  style="{background-color:#E0E0E5; border:1px solid #CCCCCC; border-collapse:collapse; text-align:left; table-layout:auto; vertical-align:middle; }">
<?php
$html = ob_get_clean();
require_once("pdfclass/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("room_request.pdf", array("Attachment" => 0));
?>
</table>
</body>
</html>
