<?php
    include "conn.php";

    $message = " ";
    session_start();
    

    $email_session= $_SESSION["email_session"];

    //echo $email_session;

    $sql = "SELECT * FROM `users` WHERE email ='$email_session'";

    $result = mysqli_query($conn, $sql) or die("Query Faield");
    $row = mysqli_fetch_array($result);
    $message = $row['diary'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dstyle.css">

    <title>My Diary</title>
  </head>
  <body background="img/1.jpg">

  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
		  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <a class="navbar-brand" href="#" style="color: #ddd" >My Secert Diary</a>
		    <form class="form-inline my-2 my-lg-0" action="logout.php" method="post">
		     <button class="btn btn-primary my-2 my-sm-0 navbar-toggler-right" type="submit">Log out</button>
		    </form>
	</nav>

  <div  id="message">
		<textarea class="container-fluid" id="text">
			<?php echo $message;  ?>
		</textarea>
            
	</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <script src="js/jquery.js"></script>
    <script src="js/action.js"></script>
   
  </body>
</html>