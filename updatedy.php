
<?php

include "conn.php";
session_start();

if( $_REQUEST["content"] ){
   

 $query = "UPDATE `users` SET `diary` = '".mysqli_real_escape_string($conn,$_REQUEST['content'])."' WHERE email = '".mysqli_real_escape_string($conn,$_SESSION['email_session'])."'LIMIT 1" ;
 $result=mysqli_query($conn,$query);
     if(mysqli_query($conn,$query)){
        echo "success";
    }else{
        echo "fail";
    }

} 


?>
