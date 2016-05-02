
<nav class='navbar'>
   
        <a href="index.php">Home</a>
    <?php if($_SESSION["level"] == 'admin') { //check if admin is logged in ?>

        <a href="adminIndex.php">AdminHome</a>
    
    <?php } 
          if(isset($_SESSION["user"])) { //check if user is logged in ?>
    
        <a href="logout.php">Logout</a>
    
    <?php } else { ?>
    
        <a href="login.php">Login</a>
   
    <?php }
          if (!isset($_SESSION["user"]) or  $_SESSION["level"] != 'admin') {
               ?>

            <a href="login.php?type=admin">AdminLogin</a>

        <?php
          }
    ?>

</nav>
