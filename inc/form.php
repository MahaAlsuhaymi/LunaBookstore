<?php
if (isset($_POST['submit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email =  $_POST['email'];

  $errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => ''
  ];
   
   //تحقق الاسم الأول
   if(empty($firstName)){
       $errors['firstNameError'] = 'Please Enter First Name';
   }

   //تحقق الاسم الأخير
   if(empty($lastName)){
    $errors['lastNameError'] = 'Please Enter Last Name';
   }

   //تحقق الايميل
   if(empty($email)){
    $errors['emailError'] = 'Please Enter Email';
   }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errors['emailError'] = 'Please Enter a correct Email';
   }
   
   //تحقق عدم وجود أخطاء
   if(!array_filter($errors)){
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO users(firstName, lastName, email) 
          VALUES ('$firstName', '$lastName', '$email')";

    if (mysqli_query($conn, $sql)) {
        header('Location: ' . $_SERVER['PHP_SELF']);
    }else{
        echo 'Error: ' . mysqli_error($conn);
    }
   }
}
?>