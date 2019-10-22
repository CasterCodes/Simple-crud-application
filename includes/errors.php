<?php if(isset($_GET['error'])):?> 
<div class="error">
   <?php
      displayErrors($connection);
   ?>
</div>
<?php endif;?>