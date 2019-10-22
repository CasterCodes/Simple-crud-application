<?php
 include_once('./config/database.php');
 include_once('functions.php');
  include('includes/header.php');
?>
<?php
  include('includes/navigation.php');
?>
 
  <section>
       <div class="container">
            <div class="posts">
               <h2> Add Post</h2>
               <div class=" add-post">
               <?php
                 include('includes/errors.php');
                 include('includes/success.php');
                 include('includes/update.php');
               ?>
                <form action="process/addpost.php" method='POST'>
                    <div class="form-group">
                        <label for="author">Author</label><br>
                        <input type="text" name='author' placeholder ='Enter author name' value = '<?php echo $author;?>'>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name='updateid'  value = '<?php echo $updateid?>'>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label><br>
                        <input type="text" placeholder ='Enter author name' value = '<?php echo $title; ?>' name='title'>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label><br>
                        <textarea name="body" id="" cols="30" rows="10"><?php echo $body;?></textarea>
                    </div>
                    <div class="form-group">
                        <?php if($update == false):?>
                           <input type="submit" name='addpost' value = 'Submit'>
                        <?php else:?>
                           <input type="submit" name='updatepost' value = 'Update'>
                        <?php endif;?>
                    </div>
                
                </form> 

               </div>
       </div>
  </section>
<?php
  include('includes/footer.php');
?>