<?php

session_start();

if (isset($_POST['submit']))
{
   $name = htmlspecialchars( trim ($_POST['name'] ) );
   $email = htmlspecialchars( trim ($_POST['email'] ) );
   $phone = htmlspecialchars( trim ($_POST['phone'] ) );
   $spec = htmlspecialchars( trim ($_POST['spec'] ) );
   $year = htmlspecialchars( trim ($_POST['year'] ) );

   $errors = [];


   // name: required | string | max:255
   if (empty($name))
   {
       $errors[] = "name is required";
   }
   elseif(is_string($name) == false)
   {
       $errors[] = "name must be string ";
   }
   elseif(strlen($name) > 255)
   {
       $errors[] = "name max 255";
   }

   //email: string | max:255
   if (!empty($email)){

    if(filter_var($email , FILTER_VALIDATE_EMAIL) == false)
   {
       $errors[] = "email is not valid";
   }
   elseif(strlen($email) > 255)
   {
       $errors[] = "email max 255";
   }
   }

   //phone
   if (empty($phone))
   {
       $errors[] = "phone is required";
   }
   elseif(is_string($phone) == false)
   {
       $errors[] = "phone must be string ";
   }
   elseif(strlen($phone) > 30)
   {
       $errors[] = "phone max 30";
   }
   
   //spec
   if (empty($spec))
   {
       $errors[] = "spec is required";
   }
   elseif(is_string($spec) == false)
   {
       $errors[] = "spec must be string ";
   }
   elseif(strlen($spec) > 255)
   {
       $errors[] = "spec max 255";
   }

   //Academic Year
   $validyears = ['1' , '2' , '3' ,'4' , '5'];
   
   if (empty($year))
   {
       $errors[] = "year is required";
   }
   elseif(! in_array($year , $validyears))
   {
       $errors[] = "year is not valid , please enter from 1-5 ";
   }
   
   //لو فيه خطأ او مفيش 
   if(empty($errors))
   {
       //الراجل سليم و ميه الميه و هنخزنه فى الداتا بيز 
       //https://www.w3schools.com/php/php_mysql_insert.asp
       //connection Database with mysql
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srs";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            //كده كده خربانه فانهى الكود لو فيه مشكله 
        die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO students (`name` , email , phone , spec , year) 
        VALUES ('$name' , '$email' , '$phone' , '$spec' , '$year')";

        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("location:../index.php");
   }
   else
   {
      //متيل بستين نيله و هنرجعله الداتا فى خلقته 
      $_SESSION['errors'] = $errors;
      $_SESSION['phone'] = $phone;
      $_SESSION['name'] = $name;
      $_SESSION['email'] = $email;
      $_SESSION['spec'] = $spec;
      $_SESSION['year'] = $year;
      

      header("location:../index.php");
   }
}

?>