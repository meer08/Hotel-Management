<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 offset md-4">
        <form action="register.php" method="post">
          <h3 class="text-center">Register</h3>

          <?php if(count($errors)>0) :



          ?>


          <div class="form-group">

            <lable for "username">Username</label>
              <input type="text" name="username" value="<?php echo $username; ?>" class="form-control form-control-lg">
            </div>

            <div class="form-group">
              <lable for "email">Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg">
              </div>

              <div class="form-group">
                <lable for "password">Password</label>
                  <input type="password" name="password" class="form-control form-control-lg">
                </div>

                <div class="form-group">
                  <lable for "passwordConf">Confirm passowrd</label>
                    <input type="password" name="passwordConf" class="form-control form-control-lg">
                  </div>

                  <div class="form-group">
                    <button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">SignUp</button>
                  </div>
                  <p class="text-ceter"> Already a memeber? <a href="login.php"> Sign In</a></p>


        </form>

      </div>
    </div>
  </div>

</body>
</html>
