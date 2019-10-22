<?php
  include_once('./config/database.php');
  include('includes/header.php');
  include_once('functions.php');
?>
<?php
  include('includes/navigation.php');
?>
 
  <section>
       <div class="container">
            <?php
                include('includes/success.php');
                include('includes/posts.php');
            ?>
       </div>
  </section>
<?php
  include('includes/footer.php');
?>
