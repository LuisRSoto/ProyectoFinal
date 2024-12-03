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

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Panel de <span>Administración</span></a>

      <nav class="navbar">
         <a href="admin_page.php">panel</a>
         <a href="admin_products.php">productos</a>
         <a href="admin_orders.php">pedidos</a>
         <a href="admin_users.php">usuarios</a>
         <a href="admin_contacts.php">mensajes</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>usuario : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>correo : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
         <div>nueva <a href="login.php">sesión</a> | <a href="register.php">registrarse</a></div>
      </div>

   </div>

</header>