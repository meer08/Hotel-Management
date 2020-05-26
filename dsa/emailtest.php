<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sending emails</title>
</head>







<body>
  <?php
  echo "hi";


   if(isset($_POST['mybutton']))
  {

    $mysqlHostname = "localhost";
    $mysqlUsername = "root";
    $mysqlPassword = "meera";
    $mysqlDb = "dsadb";

    $conn=mysql_connect($mysqlHostname, $mysqlUsername, $mysqlPassword)
    or die("Connection to MySQL database failed: ". mysql_error());


    mysql_select_db("$mysqlDb")
    or die("Selection of database failed: ".mysql_error());

    $rs= @mysql_select_db ($mysqlDb, $conn)
    or die("Could not open $mysqlDb: ".mysql_error());

    $selected = mysql_select_db("testmail",$conn);//Selecting the database

    //To enter the data into mysql




      $email = $_POST['email'];
      $uname = $_POST['uname'];


       $sql1="insert into testmail(name,email) values('$_POST[uname]','$_POST[email]')";
       $rs=@mysql_query($sql1,$conn) or die ("Could not insert!");
       echo "<br/><p align='center'><font color=green size='6pt'> Submitted successfully!";





    //sending email;

      require 'phpmailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;
      $mail->isSMTP();//if local host only...else dont
      $mail->Host='smtp.gmail.com';
      $mail->Port=587;
      $mail->SMTPAuth=true;
      $mail->SMTPSecure='tls';
      $mail->Username='hotelresidencia30@gmail.com';
      $mail->Password='residencia30$';
      $mail->setFrom('hotelresidencia30@gmail.com');
    //  $mail->AddAddress('meera_l@ymail.com');
      $mail->AddAddress($email);
      $mail->addReplyto('hotelresidencia30@gmail.com');

      $mail->isHTML(true);//MAIL USING HTML
      $mail->Subject='php mailer ';
      $mail->Body='holla';
      if(!$mail->send())
      {
        echo "Mail not sent";
      }
      else {
        echo "successful!";
      }


    }
  		 ?>

       //tables:
       //rooms master table.....room status
       //room master--room id, room no, room_description
      // 





  <form action="emailtest.php" method="post">
            <div  class="container">
              <h2>Sign Up </h2>
              <br/>


              <label for="uname"><b> Username </b></label>
                <input type="text" placeholder="Username" name="uname" id="uname" required>

                <label for="email"><b>Email</b></label>
                  <input type="email" placeholder="Enter Email" name="email" required>

              <button type="submit" name="mybutton">Sign Up</button>
            </div>

    </form>


  </div>


</body>
</html>
