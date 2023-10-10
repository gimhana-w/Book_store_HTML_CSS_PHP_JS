<?php

    //Database connect
    $conn = mysqli_connect('localhost','root','','stor');
    

    //check connection
    if($conn -> connect_error){
        die("Connection Failed :".$conn -> connect_error);
    }
    echo "Connection Successfully";
    
    //catch data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $mobilenumber = $_POST['mobilenumber'];
    $emailaddress = $_POST['emailaddress'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $password = $_POST['password'];

    $sql = "INSERT INTO registration(firstname,lastname,gender,mobilenumber,emailaddress,address,date,password)
    VALUES('$firstname','$lastname','$gender',$mobilenumber,'$emailaddress','$address',$date,'$password');";

    //CHECK DATA INSERTED OR NOT
    if($conn -> query($sql) == TRUE){
        echo"new record inserted";
    }
    else{
        echo "error".$sql."<br>".$conn -> error;
        $conn -> close();
    }


?>