<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">
<?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
         }
?>




         <table class = "styled-table">
         <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>password</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
        <?php

         $conn = mysqli_connect('localhost','root','','stor') or die('connection failed');

         $sql = "SELECT * FROM  registration";
         $result = $conn->query($sql);
         
         while ($row = $result->fetch_assoc()){
            echo"
            <tr>
            <td>$row[id]</td>
            <td>$row[firstname]</td>
            <td>$row[lastname]</td>
            <td>$row[gender]</td>
            <td>
            <a class='kk' href=',/update_profile.php'>edit</a>
            <a class='kk' href=''>delete</a>
            </tr>
            
            ";
         }
         ?>
        
      </tbody>
         </table>
   


 
      

</div>

</body>
</html>