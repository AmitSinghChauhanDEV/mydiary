<?php 
  include "conn.php";

  session_start();
  $error = "";
	$success = "";

  if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= $_POST['password'];
    
    $_SESSION["email_session"] =$email;

    if($email == ''){

			$error = "<p>Enter Your Email</p>";

		}else if($password == ''){

			$error = "<p>Enter Your Password</p>";
    }


    $query = "SELECT `email` FROM `users` WHERE email = '".mysqli_real_escape_string($conn, $_POST['email'])."'LIMIT 1";

					$result = mysqli_query($conn, $query);


					if(mysqli_num_rows($result) > 0){
				
						$error = "<p>Email already registered..</p>";

					}else{
            $sql = "INSERT INTO `users`(`email`,`password`) VALUES ('$email','$password')";
            $result = mysqli_query($conn, $sql) or die("Query Faield");

            header("Location: diarypage.php");

          }


  }
  
  if(isset($_POST['submit_log'])){
    $email= $_POST['email'];
    $password= $_POST['password'];

     
    $_SESSION["email_session"] =$email;
    

    if($email == ''){

			$error = "<p>Enter Your Email</p>";

		}else if($password == ''){

			$error = "<p>Enter Your Password</p>";
    }

    $sql = "SELECT * FROM `users` WHERE email ='$email' AND  password='$password' ";
    $result = mysqli_query($conn, $sql) or die("Query Faield");

    $row = mysqli_fetch_array($result);
    
    if($row > 0){
      header("Location: diarypage.php");
    }else{
      $error ="<p> Invalid Password or Email id..</p>";
    }


  }


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="dstyle.css">
    <title>My Diary</title>
  </head>
  <body background="1.jpg">

      <div class="container-fluid">
          <div class="row body-main">
                <div class="content text-center">
                  
                    <form id="signup_f" method="POST">
                    <h2>Secret Diary</h2>
                    <h5 class="mb-3" style="font-size: 18px;">Store Your thought permanatly and securely</h5>
                    <?php echo $error ?>
                    <h6 class="mb-4 singup_l">Intrested! Sign up now </h6>
                    <div class="mb-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Stay logged in</label>
                    </div>
                    <input type="hidden" name="sign" value="1" >
                  <button type="submit" name="submit" class="btn btn-primary mb-3 sing_btn">Sign up</button>
                  <div class="log_link" ><a href="#">Log in</a></div>  

                  </form>
                 
                  


                  <form id="login_f" method="POST">
                  <h2>Secret Diary</h2>
                    <h5 class="mb-3" style="font-size: 18px;">Store Your thought permanatly and securely</h5>
                  
                    <?php echo $error ?>
                 
                  <h6 class="mb-4 login_l">Log in using your username and password.</h6>
                    <div class="mb-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Email address</label> -->
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Stay logged in</label>
                    </div>
                    <input type="hidden" name="sign" value="0" >
                    <button type="submit" name="submit_log" class="btn btn-primary mb-3 log_b">Log in</button>
                    <div class="signup_link" ><a href="#">Sign up</a></div>  

                  </form>
               
                </div>
          </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <script src="action.js"></script>

  </body>
</html>
