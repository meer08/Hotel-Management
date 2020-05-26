<?php
ob_start();
//error_reporting(0);
SESSION_START();
//echo "appno=".$regno;

$mysqlHostname = "localhost";
$mysqlUsername = "root";
$mysqlPassword = "meera";
//$mysqlPassword = "";
$mysqlDb = "dsadb";



 $conn=mysql_connect($mysqlHostname, $mysqlUsername, $mysqlPassword)
   or die("Connection to MySQL database failed: ". mysql_error());

 mysql_select_db("$mysqlDb")
   or die("Selection of database failed: ". mysql_error());

 $rs= @mysql_select_db ($mysqlDb, $conn)
       or die ("Could not open $mysqlDb:".mysql_error());



		$query = "select * from guestdetails2 where gid=$_REQUEST[ttgid]";


        $result = mysql_query($query)
               or die ("could not execute the query");//echo mysql_error());

        $num = mysql_numrows($result);




                       while($row = mysql_fetch_array($result))
                       {
                       $tarrival_date = $row ["arrival_date"];
					   $tdeparture_date = $row ["departure_date"];
					   $troomtype_asked = $row ["room_type"];
					   $tphone_number = $row ["phone_number"];
					   $taddress = $row ["address"];
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

    <title>Print Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">

     <style>



       .two{
           font-family: 'Poiret One', cursive;
         font-size: 23px;

       }
       .three{
         text-align: left;
       }

       </style>
</head>



<body>
<table align="center"><tr><td width="15%"><img src="images/logo3.png"></td></tr></table>


<br/><br/><br/>



  <div class="container">
    <p class="two text-center "><b>Guest Details</b></p>
    <table class="table two ">
      <tbody>
		<tr >
          <td class="table two col-3"> Guest Id </td>
          <td class="three col-9"> <?php echo $_REQUEST['ttgid']; ?> </td>
        </tr>

        <tr >
          <td class="table two col-3"> Guest Name </td>
          <td class="three col-9"> <?php echo $tname; ?> </td>
        </tr>

        <tr>
          <td class="table two"> Arrival Date </td>
          <td> <?php //echo $tarrival_date;
		  echo date('d-m-Y',strtotime($tarrival_date)); ?>  </td>
        </tr>

        <tr>
          <td class="table two"> Departure Date </td>
          <td> <?php //echo $tdeparture_date;
		  echo date('d-m-Y',strtotime($tdeparture_date));
		   ?> </td>
        </tr>

        <tr>
          <td class="table two"> Room type </td>
          <td> <?php echo $troomtype_asked; ?> </td>
        </tr>

        <tr>
          <td class="table two">Phone Number </td>
          <td> <?php echo $tphone_number; ?> </td>
        </tr>

        <tr>
          <td class="table two"> Address </td>
          <td> <?php echo $taddress; ?> </td>
        </tr>

		 <tr>
          <td class="table two" align="right"> -X-X-X- </td>
          <td align="left"> <?php  ?> </td>
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
</table></h3>
</html>
