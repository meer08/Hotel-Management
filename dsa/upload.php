<html>


<body>

  <?php





  if(!isset($_FILES['userfile']))

  {

      echo '<p>Please select a file</p>';

  }

  else

  {

      try {

      $msg= upload();

      echo $msg;

      }

      catch(Exception $e) {

      echo $e->getMessage();

      echo 'Sorry, could not upload file';

      }

  }

  function upload() {



  mysql_set_charset('utf8');



      $maxsize = 100000;

      if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {

          if(is_uploaded_file($_FILES['userfile']['tmp_name']))
          {

                  if( $_FILES['userfile']['size'] < $maxsize)
                  {

                        $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
                        $db = "dsadb";

                        $host= "localhost";
                        $user= "root";
                        $pass = "meera";

                      mysql_connect($host, $user, $pass) OR DIE (mysql_error());
                       mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());

                      // our sql query

                    $sql = "INSERT INTO upload_image (img) VALUES ('{$imgData}');";






                      mysql_query($sql) or die("Error in Query: " . mysql_error());
                      echo "Recored Update successfully";
                    }
                  }

                }
              }
?>





  <form method="post" action="upload.php" enctype="multipart/form-data">

  <input type="hidden" name="MAX_FILE_SIZE" value="900000"/><input name="userfile" type="file" style="height:35px;" /><br><br>

  <input type="submit" value="submit">

  </form>

</body>
</html>
