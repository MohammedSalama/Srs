<?php

session_start();

if (isset($_POST['submit']))
{
    //read data
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    //validation
    //email: reqiured |email | max:255
    $errors = [];

    if (empty($email))
    {
        $errors[] = "email is required";
    }
    elseif(! filter_var($email , FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "email is not valid";
    }
    elseif(strlen($email) > 255)
    {
        $errors[] = "email max 255";
    }

    //password: required | string | 5 - 25
    if (empty($password))
    {
        $errors[] = "password is required";
    }elseif(! is_string($password))
    {
        $errors[] = "password must be string";
    }
    elseif(strlen($password) < 5 or strlen($password) > 25)
    {
        $errors[] = "password between 5 and 25";
    }
    if (empty($errors))
    {
        //لو الفاليديشن تماام و ميه الميه
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "srs";

        // Create connection
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);
        // Check connection
        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM admins WHERE email = '$email' ";

       $result = mysqli_query($conn , $sql);
       $numRows = mysqli_num_rows($result);

       if($numRows > 0 )
       {
           $admin = mysqli_fetch_assoc($result);
           $passowrdCheck = password_verify($password , $admin['password']);
           if ($passowrdCheck == true)
           {
               //اعمل لوج ان للراجل
               $_SESSION['adminId'] = $admin['id'];
               $_SESSION['adminName'] = $admin['name'];
               header("location:../students.php");
           }
           else
           {
               //الباسورد غلط
               $errors[] = "password is not correct";
               $_SESSION['errors'] = $errors;
               header("location:../login.php");
           }
       }
       else
       {
           //الايميل مش متسجل او مش موجود
           $errors[] = "password is not registered";
           $_SESSION['errors'] = $errors;
           header("location:../login.php");
       }

}
else
{
//لو الفايديشن و حش سيكاا
$_SESSION['errors'] = $errors;
header("location:../login.php");
}
}
?>