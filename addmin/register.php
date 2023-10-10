<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $type = mysqli_real_escape_string($conn, $_POST['ptype']);

 

   $select = mysqli_query($conn, "SELECT * FROM `system-users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
  
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `system-users`(user_name, email, password, type) VALUES('$name', '$email', '$pass', '$type')") or die('query failed');

         if($insert){
          
            $message[] = 'registered successfully!';
            header('location:home.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
      
      <input type="checkbox" id="bp" name="ptype" value="book-keeper">
      <label for="book-keeper"> book keeper</label><br>
      <input type="checkbox" id="bp" name="ptype" value="fmanager">
      <label for="fmanager"> ficancial maneger</label><br>
      <input type="checkbox" id="bp" name="ptype" value="rqmanager">
      <label for="rqmaneger"> rqmanager</label><br>
      <input type="submit" name="submit" value="Add" class="btn">
      
   </form>

</div>

</body>
</html>