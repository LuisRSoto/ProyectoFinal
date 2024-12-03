<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'usuario existente';
   }else{
      if($pass != $cpass){
         $message[] = 'las contraseñas no coinciden';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = '¡registrado con éxito!';
         header('location:login.php');
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
   <title>registrarse</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>regístrate ahora</h3>
      <input type="text" name="name" placeholder="ingresa tu nombre" required class="box">
      <input type="email" name="email" placeholder="ingresa tu correo electrónico" required class="box">
      <input type="password" name="password" placeholder="ingresa tu contraseña" required class="box">
      <input type="password" name="cpassword" placeholder="confirma tu contraseña" required class="box">
      <select name="user_type" class="box">
         <option value="user">usuario</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="registrarse" class="btn">
      <p>¿ya tienes una cuenta? <a href="login.php">inicia sesión ahora</a></p>
   </form>

</div>

</body>
</html>